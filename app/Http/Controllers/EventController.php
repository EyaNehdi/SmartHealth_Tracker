<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TypeEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('typeEvent')->orderBy('date','desc')->get();
        return view('backoffice.events.index', compact('events'));
    }

    public function create()
    {
        $types = TypeEvent::orderBy('name')->get();
        return view('backoffice.events.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'type_event_id' => 'required|exists:type_events,id',
        ]);

        Event::create($validated);
        return redirect()->route('admin.events.index')->with('success', 'Événement créé');
    }

    public function edit(Event $event)
    {
        $types = TypeEvent::orderBy('name')->get();
        return view('backoffice.events.edit', compact('event','types'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'type_event_id' => 'required|exists:type_events,id',
        ]);

        $event->update($validated);
        return redirect()->route('admin.events.index')->with('success', 'Événement modifié');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Événement supprimé');
    }


    public function frontIndex()
{
    // Charger les événements avec leur type
    $events = Event::with('typeEvent')
                    ->orderBy('date', 'desc')
                    ->paginate(6); // pagination pour front

    return view('frontoffice.events.index', compact('events'));

}

}

