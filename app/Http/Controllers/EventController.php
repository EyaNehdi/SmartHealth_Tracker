<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TypeEvent;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('typeEvent')->orderBy('date', 'desc')->get();
        return view('backoffice.events.index', compact('events'));
    }

    public function create()
    {
        $types = TypeEvent::orderBy('name')->get();
        return view('backoffice.events.create', compact('types'));
    }

    public function store(Request $request)
    {
        // ✅ Validation avec contrôle de saisie strict
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                'regex:/^[A-Za-zÀ-ÿ\s]+$/'
            ],
            'location' => [
                'required',
                'string',
                'max:255',
                'regex:/^[A-Za-zÀ-ÿ\s]+$/'
            ],
            'date' => 'required|date|after_or_equal:today',
            'description' => 'nullable|string|max:1000',
            'type_event_id' => 'required|exists:type_events,id',
        ], [
            // ✅ Messages personnalisés
            'title.required' => 'Le titre de l’événement est obligatoire.',
            'title.regex' => 'Le titre doit contenir uniquement des lettres et des espaces.',
            'location.required' => 'Le lieu est obligatoire.',
            'location.regex' => 'Le lieu doit contenir uniquement des lettres et des espaces.',
            'date.required' => 'La date est obligatoire.',
            'date.after_or_equal' => 'La date doit être aujourd’hui ou ultérieure.',
            'type_event_id.required' => 'Veuillez sélectionner un type d’événement.',
        ]);

        Event::create($validated);

        return redirect()
            ->route('admin.events.index')
            ->with('success', '✅ Événement créé avec succès !');
    }

    public function edit(Event $event)
    {
        $types = TypeEvent::orderBy('name')->get();
        return view('backoffice.events.edit', compact('event', 'types'));
    }

    public function update(Request $request, Event $event)
    {
        // ✅ Même validation que pour la création
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                'regex:/^[A-Za-zÀ-ÿ\s]+$/'
            ],
            'location' => [
                'required',
                'string',
                'max:255',
                'regex:/^[A-Za-zÀ-ÿ\s]+$/'
            ],
            'date' => 'required|date|after_or_equal:today',
            'description' => 'nullable|string|max:1000',
            'type_event_id' => 'required|exists:type_events,id',
        ], [
            'title.required' => 'Le titre de l’événement est obligatoire.',
            'title.regex' => 'Le titre doit contenir uniquement des lettres et des espaces.',
            'location.required' => 'Le lieu est obligatoire.',
            'location.regex' => 'Le lieu doit contenir uniquement des lettres et des espaces.',
            'date.required' => 'La date est obligatoire.',
            'date.after_or_equal' => 'La date doit être aujourd’hui ou ultérieure.',
            'type_event_id.required' => 'Veuillez sélectionner un type d’événement.',
        ]);

        $event->update($validated);

        return redirect()
            ->route('admin.events.index')
            ->with('success', '✏️ Événement mis à jour avec succès !');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()
            ->route('admin.events.index')
            ->with('success', '🗑️ Événement supprimé avec succès !');
    }

    // -------- FRONT --------
    public function frontIndex()
    {
        $events = Event::with('typeEvent')
            ->orderBy('date', 'desc')
            ->paginate(6);

        return view('frontoffice.events.index', compact('events'));
    }


    public function participate(Event $event)
    {
        $user = auth()->user();

        // Vérifie si l'utilisateur participe déjà
        if ($event->isParticipating($user->id)) {
            return back()->with('info', "ℹ️ Vous participez déjà à cet événement, {$user->name} !");
        }

        // Ajoute la participation
        $event->addParticipant($user->id);

        // Génération du QR Code (force GD pour éviter Imagick)
       $qrData = "Votre Ticket De l'Événement: {$event->title}\nLieu: {$event->location}\nDate: " . \Carbon\Carbon::parse($event->date)->format('d/m/Y') . "\nParticipant: {$user->name}";
        $qrCode = base64_encode(QrCode::format('svg')->size(200)->generate($qrData));


        // Retourne vers l'index avec QR code en session
        return back()
            ->with('success', "✅ Participation validée pour {$user->name} !")
            ->with('qrCode', $qrCode)
            ->with('eventId', $event->id);
    }
}







