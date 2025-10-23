<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ProduitController extends Controller
{
    /**
     * Afficher la liste des produits
     */
public function index(Request $request)
{
    $perPage = 4;
    $query = Produit::with('categorie');

    // Recherche
    if ($search = $request->input('search')) {
        $query->where(function($q) use ($search) {
            $q->where('nom', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
        });
    }

    // Filtre catégorie
    if ($cat = $request->input('category')) {
        $query->where('categorie_id', $cat);
    }

    // Tri
    switch ($request->input('sort')) {
        case 'price_asc': $query->orderBy('prix', 'asc'); break;
        case 'price_desc': $query->orderBy('prix', 'desc'); break;
        case 'name_asc': $query->orderBy('nom', 'asc'); break;
        case 'name_desc': $query->orderBy('nom', 'desc'); break;
        case 'oldest': $query->orderBy('created_at', 'asc'); break;
        case 'newest':
        default: $query->orderBy('created_at', 'desc'); break;
    }

    $produits = $query->paginate($perPage)->withQueryString();

    if ($request->ajax()) {
        $html = view('backoffice.produits.partials.list', compact('produits'))->render();
        return response()->json(['html' => $html]);
    }

    $categories = Categorie::all();
    return view('backoffice.produits.produits-list', compact('produits', 'categories'));
}


// Magasin front office
public function storeFront(Request $request)
{
    $perPage = 8;
    $query = Produit::with('categorie');

    // Recherche
    if ($search = $request->input('search')) {
        $query->where(function($q) use ($search) {
            $q->where('nom', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
        });
    }

    // Filtre catégorie
    if ($cat = $request->input('category')) {
        $query->where('categorie_id', $cat);
    }

    // Tri
    switch ($request->input('sort')) {
        case 'price_asc': $query->orderBy('prix', 'asc'); break;
        case 'price_desc': $query->orderBy('prix', 'desc'); break;
        case 'name_asc': $query->orderBy('nom', 'asc'); break;
        case 'name_desc': $query->orderBy('nom', 'desc'); break;
        case 'oldest': $query->orderBy('created_at', 'asc'); break;
        case 'newest':
        default: $query->orderBy('created_at', 'desc'); break;
    }

    $produits = $query->paginate($perPage);
    $categories = Categorie::all();

    // Si c'est une requête AJAX, retourner uniquement le partial
    if ($request->ajax()) {
        return view('frontoffice.produits.partials.list', compact('produits'))->render();
    }

    return view('frontoffice.produits.index', compact('produits', 'categories'));
}








    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('backoffice.produits.add-produit', compact('categories'));
    }

    /**
     * Enregistrer un nouveau produit
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
    'nom' => [
        'required',
        'string',
        'min:2',
        'max:255',
        'regex:/^[^\d\W].*/', // ne commence pas par chiffre ou symbole
    ],
    'description' => [
        'required',
        'string',
        'min:5',
        'regex:/^[^\d\W].*/', // ne commence pas par chiffre ou symbole
    ],
    'prix' => 'required|numeric|min:0',
    'stock' => 'required|integer|min:0',
    'categorie_id' => 'required|exists:categories,id',
    'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // max 2Mo
], [
    'nom.required' => 'Le nom du produit est obligatoire.',
    'nom.min' => 'Le nom doit contenir au moins 2 caractères.',
    'nom.max' => 'Le nom ne peut pas dépasser 255 caractères.',
    'nom.regex' => 'Le nom ne peut pas commencer par un chiffre ou un symbole.',
    'description.required' => 'La description est obligatoire.',
    'description.min' => 'La description doit contenir au moins 5 caractères.',
    'description.regex' => 'La description ne peut pas commencer par un chiffre ou un symbole.',
    'prix.required' => 'Le prix est obligatoire.',
    'prix.numeric' => 'Le prix doit être un nombre.',
    'prix.min' => 'Le prix doit être positif.',
    'stock.required' => 'Le stock est obligatoire.',
    'stock.integer' => 'Le stock doit être un entier.',
    'stock.min' => 'Le stock doit être au moins 0.',
    'categorie_id.required' => 'La catégorie est obligatoire.',
    'categorie_id.exists' => 'La catégorie sélectionnée est invalide.',
    'image.required' => 'L’image du produit est obligatoire.',
    'image.image' => 'Le fichier doit être une image.',
    'image.mimes' => 'Le format de l’image doit être jpg, jpeg, png ou gif.',
    'image.max' => 'La taille de l’image ne doit pas dépasser 2 Mo.',
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
   // Afficher un produit spécifique
public function show($id)
{
    $produit = Produit::with('categorie')->findOrFail($id);
    $categories = Categorie::all(); // si tu veux afficher la sidebar identique

    return view('frontoffice.produits.show', compact('produit', 'categories'));
}

//pdf 
public function downloadPdf(Produit $produit)
{
    $pdf = Pdf::loadView('frontoffice.produits.pdf', compact('produit'));
    return $pdf->download($produit->nom . '.pdf');
}
    /**
     * Afficher le formulaire d’édition
     */
    public function edit(Produit $produit)
    {
        $categories = Categorie::all();
        return view('backoffice.produits.edit-produit', compact('produit', 'categories'));
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
