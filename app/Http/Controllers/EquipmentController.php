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

        return view('admin.Equipments.list', compact('equipments'));
    }

    public function create()
    {
        return view('admin.Equipments.ajoute');
    }

    public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|in:cardio,musculation,rééducation,autre',
            'description' => 'nullable|string',
            'statut' => 'required|string|in:disponible,indisponible,en_maintenance',
        ]);

        Equipment::create($validated);

        return redirect()->route('admin.equipments.list')->with('message', 'Équipement ajouté avec succès.');
    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()->withErrors($e->validator)->withInput()->with('error', 'Erreur lors de l\'ajout de l\'équipement. Veuillez vérifier les champs.');
    }
}


    public function edit(Equipment $equipment)
    {
        return view('admin.Equipments.edit', compact('equipment'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        try {
            $request->validate([
                'nom' => 'required|string|max:255',
                'type' => 'required|string|in:cardio,musculation,rééducation,autre',
                'description' => 'nullable|string',
                'statut' => 'required|string|in:disponible,indisponible',
            ]);

            $equipment->update($request->all());

            return redirect()->route('admin.equipments.list')->with('updated', 'Équipement modifié avec succès.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput()->with('error', 'Erreur lors de la modification de l\'équipement. Veuillez vérifier les champs.');
        }
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return redirect()->route('admin.equipments.list')->with('success', 'Équipement supprimé avec succès.');
    }

}
