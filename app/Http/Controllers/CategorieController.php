<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Afficher la liste des catégories
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('backoffice.categories.categories-list', compact('categories'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        return view('backoffice.categories.add-categorie');
    }

    /**
     * Enregistrer une nouvelle catégorie
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Categorie::create($validated);

        return redirect()->route('admin.categories.list')
                         ->with('success', 'Catégorie créée avec succès ✅');
    }

    /**
     * Afficher une catégorie spécifique
     */
    public function show(Categorie $categorie)
    {
        return view('categories.show', compact('categorie'));
    }

    /**
     * Afficher le formulaire d’édition
     */
    public function edit(Categorie $categorie)
    {
        return view('backoffice.categories.edit-categorie', compact('categorie'));
    }

    /**
     * Mettre à jour une catégorie existante
     */
    public function update(Request $request, Categorie $categorie)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $categorie->update($validated);

        return redirect()->route('admin.categories.list')
                         ->with('success', 'Catégorie mise à jour avec succès ✏️');
    }

    /**
     * Supprimer une catégorie
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();

        return redirect()->route('admin.categories.list')
                         ->with('success', 'Catégorie supprimée avec succès 🗑️');
    }
}
