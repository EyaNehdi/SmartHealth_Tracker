<?php

namespace App\Http\Controllers;
use App\Models\CategoryActivity;
use Illuminate\Http\Request;

class CategoryActivityController extends Controller
{
  
       public function index(Request $request)
       {
           $query = CategoryActivity::query();

           if ($search = $request->query('search')) {
               $query->where('nom', 'like', '%' . $search . '%');
           }

           if ($date = $request->query('date')) {
               $query->whereDate('date_creation', $date);
           }

           $categories = $query->get();

        return view('admin.Categories.list', compact('categories'));
       }

       public function store(Request $request)
       {
           $request->validate([
               'nom' => 'required|string|max:255',
               'description' => 'nullable|string',
               'date_creation' => 'required|date',
               'statut' => 'required|string|in:disponible,indisponible',
           ]);

           $category = new CategoryActivity;
           $category->nom = $request->nom;
           $category->description = $request->description;
           $category->date_creation = $request->date_creation;
           $category->statut = $request->statut;
           $category->save();

           return redirect()->route('admin.categories.list')->with('message', 'Catégorie ajoutée avec succès ');
       }

       public function edit(CategoryActivity $category)
       {
           return view('admin.categories.edit', compact('category'));
       }

       public function update(Request $request, CategoryActivity $category)
       {
           $request->validate([
               'nom' => 'required|string|max:255',
               'description' => 'nullable|string',
               'date_creation' => 'required|date',
               'statut' => 'required|string|in:disponible,indisponible',
           ]);

           $category->update($request->all());

           return redirect()->route('admin.categories.list')->with('updated', 'Catégorie modifiée avec succès.');
       }

       public function destroy(CategoryActivity $category)
       {
           $category->delete();
           return redirect()->route('admin.categories.list')->with('success', 'Catégorie supprimée avec succès.');
       }
   }
   