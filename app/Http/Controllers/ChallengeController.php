<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class ChallengeController extends Controller
{



 public function index(Request $request)
{
    $query = $request->input('query');
    $category = $request->input('category');

    $allChallenges = Challenge::with('creator')
        ->withCount('participations')
        ->when($query, function ($q) use ($query) {
            return $q->where('titre', 'like', "%{$query}%")
                     ->orWhere('description', 'like', "%{$query}%");
        })
        ->when($category, function ($q) use ($category) {
            // Adjust based on how categories are stored (e.g., a 'category' column)
            return $q->where('category', $category);
        })
        ->paginate(2);

    $mostParticipated = Challenge::withCount('participations')
        ->orderBy('participations_count', 'desc')
        ->first();

    $search = $query;

    return view('frontoffice.challenges.index', compact('allChallenges', 'mostParticipated', 'search'));
}


public function indexAdmin(Request $request)
    {
        $search = $request->input('query');
        $allChallenges = Challenge::with('creator')
            ->withCount('participations')
            ->when($search, function ($query) use ($search) {
                $query->where('titre', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->get();

        $challenges = Challenge::where('created_by', auth()->id())
            ->withCount('participations')
            ->get();

        $mostParticipated = $allChallenges->sortByDesc('participations_count')->first();
        $users = User::all();

        return view('backoffice.challenges.index', compact('challenges', 'users', 'allChallenges', 'mostParticipated', 'search'));
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
    public function createAdmin()
    {
        $participations = auth()->user()->participations()->with('challenge', 'challenge.creator')->get();
   $challenges = Challenge::where('created_by', auth()->id())
    ->withCount('participations')
    ->get();


    $users = User::all(); // Add this line to fetch all users
        return view('backoffice.challenges.add', compact('users', 'challenges', 'participations'));
    }
  public function storeadmin(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'dateDebut' => 'required|date|after_or_equal:today',
            'dateFin' => 'required|date|after:dateDebut',
            'participants' => 'nullable|array',
            'participants.*' => 'exists:users,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $challenge = Challenge::create([
            'titre' => $validated['titre'],
            'description' => $validated['description'],
            'dateDebut' => $validated['dateDebut'],
            'dateFin' => $validated['dateFin'],
            'created_by' => auth()->id(),
        ]);

        if (!empty($validated['participants'])) {
            $challenge->participants()->attach($validated['participants']);
        }

        if ($request->hasFile('image')) {
            $challenge->image = $request->file('image')->store('challenges', 'public');
            $challenge->save();
        }

        return redirect()->route('admin.challenges.index')->with('success', 'Challenge créé avec succès !');
    }

public function store(Request $request)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'dateDebut' => 'required|date|after_or_equal:today',
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
   // Authorize the action
    if (auth()->id() !== $challenge->created_by) {
        abort(403, 'Unauthorized');
    }

    // Prevent deletion if famous
    if ($challenge->is_famous) {
        return redirect()->route('challenges.create')->with('error', 'Ce challenge est célèbre et ne peut pas être supprimé.');
    }

    // Delete associated image if exists
    if ($challenge->image) {
        Storage::disk('public')->delete($challenge->image);
    }

    // Delete participations
    $challenge->participations()->delete();

    // Delete the challenge
    $challenge->delete();

    return redirect()->route('challenges.create')->with('success', 'Challenge supprimé avec succès !');
}
public function adminDestroy(Challenge $challenge)
{
    // Authorize the action
    if (!auth()->user()->isAdmin()) {
        abort(403, 'Unauthorized');
    }

    // Delete associated image if exists
    if ($challenge->image) {
        \Storage::disk('public')->delete($challenge->image);
    }

    // Delete participations
    $challenge->participations()->delete();

    // Delete the challenge
    $challenge->delete();

    return redirect()->route('admin.challenges.index')->with('success', 'Challenge supprimé avec succès !');
}
public function edit(Challenge $challenge)
{
    // Authorize the user (only creator can edit)
    if (auth()->id() !== $challenge->created_by) {
        abort(403, 'Unauthorized');
    }

    $participations = auth()->user()->participations()->with('challenge', 'challenge.creator')->get();
    $challenges = Challenge::where('created_by', auth()->id())
        ->withCount('participations')
        ->with('creator')
        ->get();
    $users = User::all();

    return view('frontoffice.challenges.create', compact('users', 'challenges', 'participations'));
}

public function update(Request $request, Challenge $challenge)
{
    // Authorize the user
    if (auth()->id() !== $challenge->created_by) {
        abort(403, 'Unauthorized');
    }

    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'dateDebut' => 'nullable|date',
        'dateFin' => 'required|date|after:dateDebut',
        'image' => 'nullable|image|max:2048',
    ]);

    $challenge->update([
        'titre' => $validated['titre'],
        'description' => $validated['description'],
        'dateDebut' => $validated['dateDebut'],
        'dateFin' => $validated['dateFin'],
    ]);

    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($challenge->image) {
            Storage::disk('public')->delete($challenge->image);
        }
        $challenge->image = $request->file('image')->store('challenges', 'public');
        $challenge->save();
    }

    return redirect()->route('challenges.create')->with('success', 'Objectif mis à jour avec succès !');
}
 public function groups()
    {
        Log::info('Accessing user groups', ['user_id' => Auth::id()]);

        $challenges = Challenge::where('created_by', Auth::id())
            ->orWhereHas('participations', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->withCount('participations')
            ->get();

        return view('frontoffice.groups.index', compact('challenges'));
    }

// In ChallengeController.php

public function toggleFamous(Request $request, Challenge $challenge)
{
    if (!auth()->user()->isAdmin()) {
        abort(403, 'Unauthorized');
    }

    $challenge->is_famous = !$challenge->is_famous;
    $challenge->save();
    try {
        $users = $challenge->participations()->with('user')->get()->pluck('user');
        foreach ($users as $user) {
            $user->notify(new \App\Notifications\FamousChallengeNotification($challenge));
        }
        Log::info('Notifications sent for famous challenge ID: ' . $challenge->id);
    } catch (\Exception $e) {
        Log::error('Failed to send notifications for challenge ID: ' . $challenge->id . '. Error: ' . $e->getMessage());
    }

    $message = $challenge->is_famous ? 'Challenge marqué comme Célèbre !' : 'Statut Célèbre retiré du challenge !';

    return redirect()->route('admin.challenges.index')->with('success', $message);
}

}
