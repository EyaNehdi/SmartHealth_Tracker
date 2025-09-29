<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    /**
     * Afficher la liste des produits
     */
    public function index()
    {
        $produits = Produit::with('categorie')->get();
        return view('admin.produits.produits-list', compact('produits'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('admin.produits.add-produit', compact('categories'));
    }

    /**
     * Enregistrer un nouveau produit
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // max 2Mo
        ]);

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('produits', $filename, 'public');
            $validated['image'] = $path;
        }

        Produit::create($validated);

        return redirect()->route('admin.produits.list')
                         ->with('success', 'Produit créé avec succès ✅');
    }

    /**
     * Afficher un produit spécifique
     */
    public function show(Produit $produit)
    {
        $produit->load('categorie');
        return view('produits.show', compact('produit'));
    }

    /**
     * Afficher le formulaire d’édition
     */
    public function edit(Produit $produit)
    {
        $categories = Categorie::all();
        return view('admin.produits.edit-produit', compact('produit', 'categories'));
    }

    /**
     * Mettre à jour un produit existant
     */
    public function update(Request $request, Produit $produit)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Gestion de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($produit->image && Storage::disk('public')->exists($produit->image)) {
                Storage::disk('public')->delete($produit->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('produits', $filename, 'public');
            $validated['image'] = $path;
        }

        $produit->update($validated);

        return redirect()->route('admin.produits.list')
                         ->with('success', 'Produit mis à jour avec succès ✏️');
    }

    /**
     * Supprimer un produit
     */
    public function destroy(Produit $produit)
    {
        // Supprimer l'image si elle existe
        if ($produit->image && Storage::disk('public')->exists($produit->image)) {
            Storage::disk('public')->delete($produit->image);
        }

        $produit->delete();

        return redirect()->route('admin.produits.list')
                         ->with('success', 'Produit supprimé avec succès 🗑️');
    }
}
