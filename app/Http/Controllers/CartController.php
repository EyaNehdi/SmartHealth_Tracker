<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    // Ajouter un produit au panier
    public function add(Request $request)
    {
        // Récupérer les données JSON correctement
        $data = $request->json()->all();

        $cart = Session::get('cart', []);
        $id = (string) $data['id'];

        if(isset($cart[$id])){
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'id' => $id,
                'nom' => $data['nom'] ?? 'Produit',
                'prix' => isset($data['prix']) ? floatval($data['prix']) : 0,
                'image' => $data['image'] ?? '',
                'qty' => 1
            ];
        }

        Session::put('cart', $cart);

        Log::info('Cart after add', $cart);

        return response()->json(array_values($cart));
    }

    // Récupérer le panier
    public function get()
    {
        $cart = Session::get('cart', []);
        return response()->json(array_values($cart));
    }

    // Mettre à jour la quantité d’un produit
    public function update(Request $request)
    {
        $data = $request->json()->all();
        $cart = Session::get('cart', []);
        $id = (string) $data['id'];

        if(isset($cart[$id])){
            $qty = max(0, intval($data['qty'] ?? 1));
            if($qty === 0){
                unset($cart[$id]);
            } else {
                $cart[$id]['qty'] = $qty;
            }
        }

        Session::put('cart', $cart);

        Log::info('Cart after update', $cart);

        return response()->json(array_values($cart));
    }

    // Supprimer un produit du panier
    public function remove(Request $request)
    {
        $data = $request->json()->all();
        $id = (string) ($data['id'] ?? '');

        $cart = Session::get('cart', []);

        if(isset($cart[$id])){
            unset($cart[$id]);
            Log::info("Removed item $id");
        }

        Session::put('cart', $cart);

        Log::info('Cart after remove', $cart);

        return response()->json(array_values($cart));
    }
}
