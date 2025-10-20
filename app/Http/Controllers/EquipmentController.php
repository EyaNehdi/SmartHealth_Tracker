<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Equipment::query();

        if ($search = $request->query('search')) {
            $query->where('nom', 'like', '%' . $search . '%');
        }

        $equipments = $query->get();

        return view('backoffice.equipments.list', compact('equipments'));
    }

    public function create()
    {
        return view('backoffice.equipments.ajoute');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\sàáâãäåçèéêëìíîïðòóôõöùúûüýÿÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÐÒÓÔÕÖÙÚÛÜÝŸ\-]+$/u',
            ],
            'type' => 'required|string|in:cardio,musculation,rééducation,autre',
            'marque' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\sàáâãäåçèéêëìíîïðòóôõöùúûüýÿÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÐÒÓÔÕÖÙÚÛÜÝŸ\-]+$/u',
            ],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'etat' => 'required|string|in:neuf,bon,usagé,à réparer',
            'description' => 'nullable|string',
        ], [
            'nom.required' => 'Le nom de l\'équipement est requis.',
            'nom.regex' => 'Le nom doit contenir uniquement des lettres, espaces ou tirets (pas de chiffres ou caractères spéciaux).',
            'type.required' => 'Le type est requis.',
            'marque.required' => 'La marque est requise.',
            'marque.regex' => 'La marque doit contenir uniquement des lettres, espaces ou tirets (pas de chiffres ou caractères spéciaux).',
            'image.mimes' => 'L\'image doit être au format JPEG, PNG, JPG ou GIF.',
            'image.max' => 'L\'image ne doit pas dépasser 2MB.',
            'etat.required' => 'L\'état est requis.',
        ]);

        $data = $validated;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('equipments', 'public');
            $data['image'] = $imagePath;
        }

        Equipment::create($data);

        return redirect()->route('admin.equipments.list')->with('message', 'Équipement ajouté avec succès.');
    }

    public function edit(Equipment $equipment)
    {
        return view('backoffice.equipments.edit', compact('equipment'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        $validated = $request->validate([
            'nom' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\sàáâãäåçèéêëìíîïðòóôõöùúûüýÿÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÐÒÓÔÕÖÙÚÛÜÝŸ\-]+$/u',
            ],
            'type' => 'required|string|in:cardio,musculation,rééducation,autre',
            'marque' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\sàáâãäåçèéêëìíîïðòóôõöùúûüýÿÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÐÒÓÔÕÖÙÚÛÜÝŸ\-]+$/u',
            ],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'etat' => 'required|string|in:neuf,bon,usagé,à réparer',
            'description' => 'nullable|string',
        ], [
            'nom.required' => 'Le nom de l\'équipement est requis.',
            'nom.regex' => 'Le nom doit contenir uniquement des lettres, espaces ou tirets (pas de chiffres ou caractères spéciaux).',
            'type.required' => 'Le type est requis.',
            'marque.required' => 'La marque est requise.',
            'marque.regex' => 'La marque doit contenir uniquement des lettres, espaces ou tirets (pas de chiffres ou caractères spéciaux).',
            'image.mimes' => 'L\'image doit être au format JPEG, PNG, JPG ou GIF.',
            'image.max' => 'L\'image ne doit pas dépasser 2MB.',
            'etat.required' => 'L\'état est requis.',
        ]);

        $data = $validated;

        if ($request->hasFile('image')) {
            if ($equipment->image) {
                \Storage::disk('public')->delete($equipment->image);
            }
            $imagePath = $request->file('image')->store('equipments', 'public');
            $data['image'] = $imagePath;
        }

        $equipment->update($data);

        return redirect()->route('admin.equipments.list')->with('updated', 'Équipement modifié avec succès.');
    }

    public function destroy(Equipment $equipment)
    {
        if ($equipment->image) {
            \Storage::disk('public')->delete($equipment->image);
        }
        $equipment->delete();
        return redirect()->route('admin.equipments.list')->with('success', 'Équipement supprimé avec succès.');
    }
}