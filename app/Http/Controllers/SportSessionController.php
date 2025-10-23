<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SportSession; // Assuming you have this model for storing sessions

class SportSessionController extends Controller
{
    public function create()
    {
        return view('cammera'); // Renders cammera.blade.php
    }

    public function store(Request $request)
    {
        $request->validate([
            'session_data' => 'required|json',
        ]);

        $session = $request->user()->sportSessions()->create([
            'session_data' => $request->session_data,
        ]);

        return response()->json(['message' => 'Session saved', 'session' => $session]);
    }
}
