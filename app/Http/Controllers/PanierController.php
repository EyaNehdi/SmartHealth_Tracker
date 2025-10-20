<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PanierController extends Controller
{
    public function show()
    {
        $panier = Session::get('panier', []);
        $total = 0;

        foreach ($panier as $item) {
            $total += ($item['prix'] ?? 0) * ($item['qty'] ?? 1);
        }

        return view('frontoffice.panier.show', compact('panier', 'total'));
    }
}

