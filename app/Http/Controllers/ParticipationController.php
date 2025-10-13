<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participation;
use App\Models\Challenge;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ParticipationController extends Controller
{
    public function index()
    {
        $participations = Participation::with(['challenge', 'user'])->latest()->get();
        return view('frontoffice.participations.index', compact('participations'));
    }

    public function create()
    {
        $challenges = Challenge::all();
        $users = User::all();
        return view('frontoffice.participations.create', compact('challenges', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'challenge_id' => 'required|exists:challenges,id',
            'user_id' => 'required|exists:users,id',
            'comment' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('participations', 'public');
        }

        Participation::create($data);

        return redirect()->route('challenges.index')->with('success', 'Participation added successfully!');
    }

    public function edit(Participation $participation)
    {
        $challenges = Challenge::all();
        $users = User::all();
        return view('frontoffice.participations.edit', compact('participation', 'challenges', 'users'));
    }

    public function update(Request $request, Participation $participation)
    {
        $request->validate([
            'challenge_id' => 'required|exists:challenges,id',
            'user_id' => 'required|exists:users,id',
            'comment' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($participation->image && Storage::exists('public/' . $participation->image)) {
                Storage::delete('public/' . $participation->image);
            }
            $data['image'] = $request->file('image')->store('participations', 'public');
        }

        $participation->update($data);

        return redirect()->route('participations.index')->with('success', 'Participation updated successfully!');
    }

    public function destroy(Participation $participation)
    {
        if ($participation->image && Storage::exists('public/' . $participation->image)) {
            Storage::delete('public/' . $participation->image);
        }

        $participation->delete();

        return redirect()->route('participations.index')->with('success', 'Participation deleted successfully!');
    }
public function reply(Request $request, $id)
{
    $participation = Participation::findOrFail($id);

    // Check if current user is the challenge owner
    if (!$participation->challenge || $participation->challenge->created_by !== Auth::id()) {
        abort(403);
    }

    $participation->reply = $request->input('reply');
    $participation->save();

    return back()->with('success', 'Reply added successfully.');
}

public function participantReply(Request $request, Participation $participation)
{
    $request->validate([
        'participant_reply' => 'required|string|max:255',
    ]);

    $participation->update([
        'participant_reply' => $request->participant_reply,
    ]);

    if ($request->ajax()) {
        return response()->json(['success' => true, 'message' => 'Reply sent!']);
    }

    return back()->with('success', 'Reply sent!');
}


public function myParticipations()
{
    /** @var \App\Models\User $user */
    $user = Auth::user();
    if (!$user) {
        abort(401);
    }
    
    $participations = $user->participations()->with('challenge', 'challenge.creator')->get();

    return view('frontoffice.participations.create', compact('participations'));
}
// ParticipationController.php




}
