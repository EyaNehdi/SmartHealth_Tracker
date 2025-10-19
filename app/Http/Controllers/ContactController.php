<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Log;


class ContactController extends Controller
{
    public function index()
    {
        return view('frontoffice.contact.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send email (optional - configure Mail settings in .env)
        try {
            Mail::to('jihedhorchani1234@gmail.com')->send(new ContactMail($validated));
        } catch (\Exception $e) {
            // Log error but don't fail the request
            Log::error('Contact form email failed: ' . $e->getMessage());
        }

        return redirect()->route('contact')->with('success', 'Votre message a été envoyé avec succès ! Nous vous répondrons bientôt.');
    }
}
