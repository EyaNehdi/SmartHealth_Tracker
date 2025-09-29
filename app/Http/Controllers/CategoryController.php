<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{


    
    public function index()
    {
          $query = Category::query();

        // Recherche par mot-clé (nom)
        if ($search = $request->query('search')) {
            $query->where('nom', 'like', '%' . $search . '%');
        }

        // Filtrage par date (date_creation)
        if ($date = $request->query('date')) {
            $query->whereDate('date_creation', $date);
        }

        $categories = $query->get();

        return view('categories.index', compact('categories'));
    }



    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.list')->with('success', 'Catégorie supprimée avec succès.');
    }
    



     public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

     public function update(Request $request, Category $category)
    {
       

        $category->update($request->all());

        return redirect()->route('categories.list')->with('updated', 'Catégorie modifiée avec succès.');
    }

    
    public function store(Request $request)
    {
        // Create and save the category
        $category = new Category;
        $category->nom = $request->nom;
        $category->description = $request->description;
        $category->date_creation = $request->date_creation;
        $category->statut = $request->statut;
        $category->save();

        return redirect()->route('categories.create')->with('message', 'Catégorie ajoutée avec succès !');
    }
}