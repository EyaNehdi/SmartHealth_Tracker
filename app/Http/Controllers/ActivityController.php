<?php

namespace App\Http\Controllers;
use App\Models\CategoryActivity;
use App\Models\Activity;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function create()
    {
        $categories = CategoryActivity::all();
        $equipments = Equipment::all(); // Ajouter les équipements
        return view('activities.Ajout', compact('categories', 'equipments')); // Passer equipments à la vue
    }

    public function index(Request $request)
    {
        $query = Activity::where('user_id', Auth::id())->with(['category', 'equipments']); // Inclure equipments

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
            'equipments' => 'nullable|array',
            'equipments.*' => 'exists:equipments,id', // Valider que chaque équipement existe
            'equipment_comment' => 'nullable|string',
        ]);

        $activity = new Activity;
        $activity->nom = $request->nom;
        $activity->description = $request->description;
        $activity->date = $request->date;
        $activity->duree = $request->duree;
        $activity->user_id = Auth::id();
        $activity->save();

        // Associer les équipements à l'activité via la table pivot
        if ($request->has('equipments')) {
            $activity->equipments()->attach($request->equipments, [
                'commentaire' => $request->equipment_comment,
            ]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Activité ajoutée avec succès !',
                'activity' => $activity->load('equipments'),
            ]);
        }

        return redirect()->route('activities.index')->with('success', 'Activité ajoutée avec succès !');
    }

    public function edit(Activity $activity)
    {
        if ($activity->user_id !== Auth::id()) {
            abort(403, 'Non autorisé');
        }

        $categories = CategoryActivity::all();
        $equipments = Equipment::all(); // Ajouter les équipements pour l'édition
        return view('activities.edit', compact('activity', 'categories', 'equipments')); // Passer equipments
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
            'equipments' => 'nullable|array',
            'equipments.*' => 'exists:equipments,id',
            'equipment_comment' => 'nullable|string',
        ]);

        $activity->nom = $request->nom;
        $activity->description = $request->description;
        $activity->date = $request->date;
        $activity->duree = $request->duree;
        $activity->save();

        // Mettre à jour les équipements associés
        if ($request->has('equipments')) {
            $activity->equipments()->sync($request->equipments, [
                'commentaire' => $request->equipment_comment,
            ]);
        } else {
            $activity->equipments()->detach(); // Supprimer les associations si aucun équipement n'est sélectionné
        }

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