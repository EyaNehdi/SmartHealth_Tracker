<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class ChallengeController extends Controller
{



    public function index(Request $request)
{
    // Get search query from input
    $search = $request->input('query');

    // Fetch all challenges (with participations count + creator) and filter if search exists
    $allChallenges = Challenge::with('creator')
        ->withCount('participations')
        ->when($search, function ($query) use ($search) {
            $query->where('titre', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        })
        ->get();

    // Challenges created by current user
    $challenges = Challenge::where('created_by', auth()->id())
        ->withCount('participations')
        ->get();

    // Challenge with the most participants
    $mostParticipated = $allChallenges->sortByDesc('participations_count')->first();

    $users = User::all();

    return view('frontoffice.challenges.index', compact('challenges', 'users', 'allChallenges', 'mostParticipated', 'search'));
}





    public function create()
    {
        $participations = auth()->user()->participations()->with('challenge', 'challenge.creator')->get();
   $challenges = Challenge::where('created_by', auth()->id())
    ->withCount('participations')
    ->get();


    $users = User::all(); // Add this line to fetch all users
        return view('frontoffice.challenges.create', compact('users', 'challenges', 'participations'));
    }

public function store(Request $request)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'dateDebut' => 'required|date',
        'dateFin' => 'required|date|after_or_equal:dateDebut',
        'image' => 'nullable|image|max:2048',
    ]);

    $data = [
        'titre' => $request->titre,
        'description' => $request->description,
        'dateDebut' => $request->dateDebut,
        'dateFin' => $request->dateFin,
        'created_by' => auth()->id(),
    ];

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('challenges', 'public');
    }

    Challenge::create($data);

    return redirect()->route('challenges.index')->with('success', 'Challenge created!');
}

public function destroy(Challenge $challenge)
{
    // Vérifier que l’utilisateur est bien le créateur
    if ($challenge->created_by !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    // Supprimer l’image du stockage si elle existe
    if ($challenge->image && Storage::disk('public')->exists($challenge->image)) {
        Storage::disk('public')->delete($challenge->image);
    }

    // Supprimer le challenge
    $challenge->delete();

    return redirect()->route('challenges.index')->with('success', 'Challenge supprimé avec succès.');
}
public function edit(Challenge $challenge)
{
    if ($challenge->created_by !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    return view('frontoffice.challenges.edit', compact('challenge'));
}

public function update(Request $request, Challenge $challenge)
{
    if ($challenge->created_by !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'dateDebut' => 'required|date',
        'dateFin' => 'required|date|after_or_equal:dateDebut',
        'image' => 'nullable|image|max:2048',
    ]);

    $data = $request->only(['titre', 'description', 'dateDebut', 'dateFin']);

    // Gérer la nouvelle image
    if ($request->hasFile('image')) {
        // Supprimer l’ancienne si elle existe
        if ($challenge->image && Storage::disk('public')->exists($challenge->image)) {
            Storage::disk('public')->delete($challenge->image);
        }

        $data['image'] = $request->file('image')->store('challenges', 'public');
    }

    $challenge->update($data);

    return redirect()->route('challenges.index')->with('success', 'Challenge modifié avec succès.');
}


}
