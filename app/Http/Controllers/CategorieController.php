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
        ], [
            'nom.required' => '⚠️ Le nom de la catégorie est obligatoire.',
            'nom.max' => '⚠️ Le nom de la catégorie ne peut pas dépasser 255 caractères.',
            'description.string' => '⚠️ La description doit être du texte valide.',
        ]);

        Categorie::create($validated);

        return redirect()->route('admin.categories.list')
                         ->with('success', '✅ Catégorie créée avec succès !');
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
    'nom' => ['required', 'string', 'min:2', 'max:255', function($attribute, $value, $fail) {
        if (preg_match('/^[\d\W]/', $value)) {
            $fail('⚠️ Le nom ne peut pas commencer par un chiffre ou un symbole.');
        }
    }],
    'description' => ['required', 'string', 'min:5', function($attribute, $value, $fail) {
        if (preg_match('/^[\d\W]/', $value)) {
            $fail('⚠️ La description ne peut pas commencer par un chiffre ou un symbole.');
        }
    }],
], [
    'nom.required' => '⚠️ Le nom de la catégorie est obligatoire.',
    'nom.min' => '⚠️ Le nom doit contenir au moins 2 caractères.',
    'nom.max' => '⚠️ Le nom ne peut pas dépasser 255 caractères.',
    'description.required' => '⚠️ La description est obligatoire.',
    'description.min' => '⚠️ La description doit contenir au moins 5 caractères.',
    'description.string' => '⚠️ La description doit être du texte valide.',
]);




        $categorie->update($validated);

        return redirect()->route('admin.categories.list')
                         ->with('success', '✏️ Catégorie mise à jour avec succès !');
    }

    /**
     * Supprimer une catégorie
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();

        return redirect()->route('admin.categories.list')
                         ->with('success', '🗑️ Catégorie supprimée avec succès !');
    }
}
