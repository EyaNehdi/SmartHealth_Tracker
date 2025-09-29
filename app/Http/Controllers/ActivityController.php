<?php

namespace App\Http\Controllers;
use App\Models\CategoryActivity;
use App\Models\Activity;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
       public function create()
       {
           $categories = CategoryActivity::all();
           return view('activities.Ajout', compact('categories'));
       }

       public function index(Request $request)
       {
           $query = Activity::where('user_id', Auth::id())->with('category');

           if ($search = $request->query('search')) {
               $query->where(function ($q) use ($search) {
                   $q->where('nom', 'like', '%' . $search . '%')
                     ->orWhere('description', 'like', '%' . $search . '%');
               });
           }

           if ($category_id = $request->query('category_id')) {
               $query->where('categorie_activity_id', $category_id);
           }

           if ($date = $request->query('date')) {
               $query->whereDate('date', $date);
           }

           $activities = $query->get();
           $categories = CategoryActivity::all();

           return view('activities.list', compact('activities', 'categories'));
       }

       public function store(Request $request)
       {
           $request->validate([
               'nom' => 'required|string|max:255',
               'description' => 'nullable|string',
               'date' => 'required|date',
               'duree' => 'nullable|integer|min:0',
               'categorie_activity_id' => 'nullable|exists:categorie_activity,id',
               'completed' => 'boolean',
           ]);

           $activity = new Activity;
           $activity->nom = $request->nom;
           $activity->description = $request->description;
           $activity->date = $request->date;
           $activity->duree = $request->duree;
           $activity->categorie_activity_id = $request->categorie_activity_id;
           $activity->user_id = Auth::id();
           $activity->completed = $request->filled('completed');
           $activity->save();

           if ($request->expectsJson()) {
               return response()->json([
                   'success' => true,
                   'message' => 'Activité ajoutée avec succès !',
                   'activity' => $activity
               ]);
           }

           return redirect()->route('activities.create')->with('success', 'Activité ajoutée avec succès !');
       }

       public function edit(Activity $activity)
       {
           if ($activity->user_id !== Auth::id()) {
               abort(403, 'Non autorisé');
           }

           $categories = CategoryActivity::all();
           return view('activities.edit', compact('activity', 'categories'));
       }

       public function update(Request $request, Activity $activity)
       {
           if ($activity->user_id !== Auth::id()) {
               abort(403, 'Non autorisé');
           }

           $request->validate([
               'nom' => 'required|string|max:255',
               'description' => 'nullable|string',
               'date' => 'required|date',
               'duree' => 'nullable|integer|min:0',
               'categorie_activity_id' => 'nullable|exists:categorie_activity,id',
               'completed' => 'boolean',
           ]);

           $activity->nom = $request->nom;
           $activity->description = $request->description;
           $activity->date = $request->date;
           $activity->duree = $request->duree;
           $activity->categorie_activity_id = $request->categorie_activity_id;
           $activity->completed = $request->filled('completed');
           $activity->save();

           return redirect()->route('activities.index')->with('updated', 'Activité mise à jour avec succès.');
       }

       public function destroy(Activity $activity)
       {
           if ($activity->user_id !== Auth::id()) {
               abort(403, 'Non autorisé');
           }

           $activity->delete();
           return redirect()->route('activities.index')->with('success', 'Activité supprimée avec succès.');
       }
   }