<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPreference;

class PreferenceController extends Controller
{
    public function create()
    {
        $popularTags = ['relaxation', 'sport', 'yoga', 'meditation', 'fitness', 'santé', 'bien-être', 'nutrition', 'cardio', 'musculation'];
        return view('frontoffice.preferences.create', compact('popularTags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'preferences' => 'required|array|min:1',
            'preferences.*' => 'string|max:50'
        ]);

        $user = Auth::user();
        
        // Supprimer les anciennes préférences
        UserPreference::where('user_id', $user->id)->delete();
        
        // Ajouter les nouvelles préférences
        foreach ($request->preferences as $preference) {
            UserPreference::create([
                'user_id' => $user->id,
                'tag' => $preference,
                'weight' => 1
            ]);
        }

        return redirect()->route('activities.recommended')
                         ->with('success', 'Vos préférences ont été enregistrées !');
    }
}