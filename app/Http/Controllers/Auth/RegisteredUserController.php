<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPreference; // AJOUTEZ CETTE LIGNE
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Afficher la vue d'inscription.
     */
    public function create(): View
    {
        // Liste des préférences prédéfinies
        $preferences = [
            'Relaxation',
            'Cardio',
            'Renforcement musculaire',
            'Flexibilité',
            'Endurance',
        ];
        return view('auth.register', compact('preferences'));
    }

    /**
     * Gérer une demande d'inscription.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'preference' => ['required', 'string', 'in:Relaxation,Cardio,Renforcement musculaire,Flexibilité,Endurance'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'preference' => $request->preference, // Garder l'ancien champ pour compatibilité
        ]);

        // AJOUTEZ CETTE PARTIE : Créer la préférence dans la nouvelle table
        UserPreference::create([
            'user_id' => $user->id,
            'tag' => $request->preference,
            'weight' => 1.0
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }
}