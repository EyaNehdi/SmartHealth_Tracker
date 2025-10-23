<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Produit; // <-- ajouté pour gérer le stock
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class StripeController extends Controller
{
    protected function getPanier(Request $request)
    {
        // Exemple : panier stocké en session — adapte si besoin
        $panier = session('cart', []);
        return $panier;
    }

    // Endpoint : créer une session Stripe (EUR)
    public function createCheckoutSession(Request $request)
    {
        // --- 1️⃣ Récupérer le panier depuis la session ---
        $panier = session('cart', []);

        if (empty($panier)) {
            return response()->json(['error' => 'Panier vide'], 400);
        }

        // --- 2️⃣ Calculer total en TND ---
        $totalTND = 0;
        foreach ($panier as $item) {
            $price = isset($item['prix']) ? (float)$item['prix'] : 0;
            $qty = isset($item['qty']) ? (int)$item['qty'] : 1;
            $totalTND += $price * $qty;
        }

        // --- 3️⃣ Récupérer le taux TND -> EUR avec fallback ---
        $cacheKey = 'rate_TND_EUR';
        $rate = Cache::get($cacheKey);

        if (!$rate) {
            try {
                $resp = Http::get('https://api.exchangerate.host/convert', [
                    'from' => 'TND',
                    'to' => 'EUR',
                    'amount' => 1
                ]);

                if ($resp->ok() && isset($resp['result'])) {
                    $rate = (float) $resp['result'];
                    Cache::put($cacheKey, $rate, now()->addMinutes(15));
                } else {
                    // fallback taux fixe si API échoue
                    $rate = 0.28; // exemple, 1 TND ≈ 0.28 EUR
                    Log::warning('API conversion échouée, taux fixe appliqué', ['body' => $resp->body()]);
                }
            } catch (\Exception $e) {
                Log::error('Erreur conversion TND->EUR : ' . $e->getMessage());
                // fallback taux fixe
                $rate = 0.28;
            }
        }

        // --- 4️⃣ Convertir total en EUR ---
        $totalEUR = $totalTND * $rate;
        $amountCents = (int) round($totalEUR * 100);

        if ($amountCents < 50) {
            return response()->json(['error' => 'Montant minimum de 0.50€ requis'], 400);
        }

        // --- 5️⃣ Créer session Stripe ---
        try {
            Stripe::setApiKey(env('STRIPE_KEY_SECRET_MAGASIN'));

            $line_items = [];
            foreach ($panier as $item) {
                $unitPriceEUR = (float) round(($item['prix'] * $rate) * 100) / 100;
                $line_items[] = [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => $item['nom'] ?? 'Produit',
                        ],
                        'unit_amount' => (int) round($unitPriceEUR * 100),
                    ],
                    'quantity' => (int) ($item['qty'] ?? 1),
                ];
            }

            $session = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('checkout.cancel'),
                'metadata' => [
                    'user_id' => optional(auth()->user())->id ?? 'guest',
                ],
            ]);

            return response()->json(['url' => $session->url]);

        } catch (\Exception $e) {
            Log::error('Stripe error: ' . $e->getMessage());
            return response()->json(['error' => 'Erreur lors de la création de la session Stripe'], 500);
        }
    }

    public function success(Request $request)
    {
        $panier = session('cart', []);

        // --- Décrémenter le stock en fonction de la quantité achetée ---
        DB::transaction(function () use ($panier) {
            foreach ($panier as $item) {
                if (isset($item['id']) && isset($item['qty'])) {
                    $produit = Produit::find($item['id']);
                    if ($produit) {
                        $produit->stock = max(0, $produit->stock - $item['qty']);
                        $produit->save();
                    }
                }
            }
        });

        // Vider le panier après paiement réussi
        $request->session()->forget('cart');

        return view('frontoffice.payments.success');
    }

    public function cancel(Request $request)
    {
        return view('frontoffice.payments.cancel');
    }
}
