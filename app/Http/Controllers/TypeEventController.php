<?php

namespace App\Http\Controllers;

use App\Models\TypeEvent;
use Illuminate\Http\Request;

class TypeEventController extends Controller
{
    // Liste des types d'événements
    public function index()
    {
        $types = TypeEvent::orderBy('name')->get();
        return view('backoffice.type_events.index', compact('types'));
    }

    // Formulaire création
    public function create()
    {
        return view('backoffice.type_events.create');
    }

    // Enregistrement nouveau type
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-zÀ-ÿ\s]+$/']
        ], [
            'name.required' => 'Le nom du type est obligatoire.',
            'name.regex' => 'Le nom du type doit contenir uniquement des lettres.'
        ]);

        TypeEvent::create($request->only('name'));

        return redirect()->route('admin.type_events.index')
                         ->with('success', '✅ Type créé avec succès !');
    }

    // Formulaire édition
    public function edit(TypeEvent $typeEvent)
    {
        return view('backoffice.type_events.edit', compact('typeEvent'));
    }

    // Mise à jour type existant
    public function update(Request $request, TypeEvent $typeEvent)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-zÀ-ÿ\s]+$/']
        ], [
            'name.required' => 'Le nom du type est obligatoire.',
            'name.regex' => 'Le nom du type doit contenir uniquement des lettres.'
        ]);

        $typeEvent->update($request->only('name'));

        return redirect()->route('admin.type_events.index')
                         ->with('success', '✏️ Type modifié avec succès !');
    }

    // Suppression
    public function destroy(TypeEvent $typeEvent)
    {
        $typeEvent->delete();
        return redirect()->route('admin.type_events.index')
                         ->with('success', '🗑️ Type supprimé avec succès !');
    }
}
