<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Activity;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{

     public function create()
    {
        $categories = Category::all();
        return view('activities.Ajout', compact('categories'));
    }

  
      public function index(Request $request)
    {
        $query = Activity::where('user_id', Auth::id())->with('category');

        // Recherche par mot-clé (nom ou description)
        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Filtrage par catégorie
        if ($category_id = $request->query('category_id')) {
            $query->where('category_id', $category_id);
        }

        // Filtrage par date (jour exact)
        if ($date = $request->query('date')) {
            $query->whereDate('date', $date);
        }

        $activities = $query->get();
        $categories = Category::all();

        return view('activities.list', compact('activities', 'categories'));
    }

    
    


     public function destroy(Activity $activity)
    {
        // Vérifier que l'activité appartient à l'utilisateur connecté
        if ($activity->user_id !== Auth::id()) {
            abort(403, 'Non autorisé');
        }

        $activity->delete();
        return redirect()->route('activities.index')->with('success', 'Activité supprimée avec succès.');
    }
     public function store(Request $request)
    {
      
        // Create and save the activity
        $activity = new Activity;
        $activity->nom = $request->nom;
        $activity->description = $request->description;
        $activity->date = $request->date;
        $activity->duree = $request->duree;
        $activity->category_id = $request->category_id;
        $activity->user_id = Auth::id();
        $activity->completed = $request->filled('completed');
        $activity->save();

        return redirect()->route('activities.create')->with('success', 'Activité ajoutée avec succès !');
    }


    public function edit(Activity $activity)
    {
        // Vérifier que l'activité appartient à l'utilisateur connecté
        if ($activity->user_id !== Auth::id()) {
            abort(403, 'Non autorisé');
        }

        $categories = Category::all();
        return view('activities.edit', compact('activity', 'categories'));
    }



    public function update(Request $request, Activity $activity)
    {
        // Vérifier que l'activité appartient à l'utilisateur connecté
        if ($activity->user_id !== Auth::id()) {
            abort(403, 'Non autorisé');
        }

        $activity->nom = $request->nom;
        $activity->description = $request->description;
        $activity->date = $request->date;
        $activity->duree = $request->duree;
        $activity->category_id = $request->category_id;
        $activity->completed = $request->filled('completed');
        $activity->save();

        return redirect()->route('activities.index')->with('updated', 'Activité mise à jour avec succès.');
    }
}
