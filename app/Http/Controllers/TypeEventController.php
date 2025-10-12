<?php

namespace App\Http\Controllers;

use App\Models\TypeEvent;
use Illuminate\Http\Request;

class TypeEventController extends Controller
{
    /**
     * Affiche la liste des types d'événements.
     */
    public function index()
    {
        $types = TypeEvent::orderBy('name')->get();
        return view('backoffice.type_events.index', compact('types'));
    }

    /**
     * Affiche le formulaire de création d'un type d'événement.
     */
    public function create()
    {
        return view('backoffice.type_events.create');
    }

    /**
     * Enregistre un nouveau type d'événement dans la base.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        TypeEvent::create($request->only('name'));

        return redirect()->route('admin.type_events.index')
                         ->with('success', 'Type créé avec succès !');
    }

    /**
     * Affiche le formulaire d'édition d'un type d'événement.
     */
    public function edit(TypeEvent $typeEvent)
    {
        return view('backoffice.type_events.edit', compact('typeEvent'));
    }

    /**
     * Met à jour un type d'événement existant.
     */
    public function update(Request $request, TypeEvent $typeEvent)
    {
        $request->validate(['name' => 'required|string|max:255']);

        $typeEvent->update($request->only('name'));

        return redirect()->route('admin.type_events.index')
                         ->with('success', 'Type modifié avec succès !');
    }

    /**
     * Supprime un type d'événement.
     */
    public function destroy(TypeEvent $typeEvent)
    {
        $typeEvent->delete();

        return redirect()->route('admin.type_events.index')
                         ->with('success', 'Type supprimé avec succès !');
    }
}
