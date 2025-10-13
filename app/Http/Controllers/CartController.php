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
        $cart = Session::get('cart', []);
        $id = (string) $request->id;

        if(isset($cart[$id])){
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'id' => $id,
                'nom' => $request->nom,
                'prix' => floatval($request->prix),
                'image' => $request->image,
                'qty' => 1
            ];
        }

        Session::put('cart', $cart);
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
        $cart = Session::get('cart', []);
        $id = (string) $request->id;

        if(isset($cart[$id])){
            $cart[$id]['qty'] = max(0, intval($request->qty));
            if($cart[$id]['qty'] === 0){
                unset($cart[$id]);
            }
        }

        Session::put('cart', $cart);
        return response()->json(array_values($cart));
    }

    // Supprimer un produit du panier
    public function remove(Request $request)
    {
        $id = (string) $request->id;
        $cart = Session::get('cart', []);

        Log::info('Cart before remove', $cart);

        // Vérifier si l'item existe et supprimer
        if(array_key_exists($id, $cart)){
            unset($cart[$id]);
            Log::info("Removed item $id");
        } else {
            // Si pas trouvé par clé, chercher par id dans la liste (au cas où)
            foreach($cart as $key => $item){
                if($item['id'] === $id){
                    unset($cart[$key]);
                    Log::info("Removed item $id by value search");
                    break;
                }
            }
            if(!isset($cart[$id])){
                Log::warning("Item $id not found in cart");
            }
        }

        Session::put('cart', $cart);
        Log::info('Cart after remove', $cart);

        return response()->json(array_values($cart));
    }
}
