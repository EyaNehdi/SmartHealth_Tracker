<?php

namespace App\Http\Controllers;
use App\Models\CategoryActivity;
use App\Models\Activity;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Stripe\Stripe;
use Stripe\Exception\AuthenticationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminActivityPaidMail;
use App\Models\Comment;

class ActivityController extends Controller
{
    public function create()
    {
        $categories = CategoryActivity::all();
        $equipments = Equipment::all();
        return view('backoffice.Activity.ajout', compact('categories', 'equipments'));
    }

    public function index(Request $request)
    {
        $query = Activity::with(['category', 'equipments']);

        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('avis', 'like', '%' . $search . '%');
            });
        }

        if ($category_id = $request->query('category_id')) {
            $query->where('categorie_activity_id', $category_id);
        }

        if ($date = $request->query('date_debut')) {
            $query->whereDate('date_debut', $date);
        }

        $activities = $query->get();
        $categories = CategoryActivity::all();

        return view('backoffice.Activity.list', compact('activities', 'categories'));
    }


public function store(Request $request)
{
    $validated = $request->validate([
        'nom' => [
            'required',
            'string',
            'max:255',
            'regex:/^[A-Za-z\s\-]+$/',
        ],
        'description' => 'required|string',
        'date_debut' => 'required|date',
        'date_fin' => [
            'required',
            'date',
            'after_or_equal:date_debut',
        ],
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        'support_pdf' => 'nullable|file|mimes:pdf|max:10000',
        'support_video' => 'nullable|file|mimes:mp4,avi,mov|max:50000',
        'prix' => 'required|numeric|min:0',
        'equipments' => 'required|array|min:1',
        'equipments.*' => 'exists:equipments,id',
        'equipment_comment' => 'required|string',
    ], [
        // Messages d'erreur
    ]);

    $activity = new Activity;
    $activity->nom = $request->nom;
    $activity->description = $request->description;
    $activity->date_debut = $request->date_debut;
    $activity->date_fin = $request->date_fin;
    $activity->prix = $request->prix;
    $activity->user_id = Auth::id();

    if ($request->hasFile('image')) {
        Log::info('Image upload attempt for activity', ['file' => $request->file('image')->getClientOriginalName()]);
        $path = $request->file('image')->store('activities/images', 'public');
        Log::info('Image stored at', ['path' => $path]);
        $activity->image = $path;
    } else {
        Log::info('No image file provided for activity');
    }

    if ($request->hasFile('support_pdf')) {
        $activity->support_pdf = $request->file('support_pdf')->store('activities/pdfs', 'public');
    }
    if ($request->hasFile('support_video')) {
        $activity->support_video = $request->file('support_video')->store('activities/videos', 'public');
    }

    $activity->save();

    $activity->equipments()->attach($request->equipments, [
        'commentaire' => $request->equipment_comment,
    ]);

    if ($request->expectsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Activité ajoutée avec succès !',
            'activity' => $activity->load('equipments'),
        ]);
    }

    return redirect()->route('admin.activities.index')->with('success', 'Activité ajoutée avec succès !');
}

    public function edit(Activity $activity)
    {
        $categories = CategoryActivity::all();
        $equipments = Equipment::all();
        return view('backoffice.Activity.edit', compact('activity', 'categories', 'equipments'));
    }

    public function update(Request $request, Activity $activity)
    {
        // Validate the request
        $validated = $request->validate([
            'nom' => ['required', 'string', 'regex:/^[a-zA-Z\sàáâãäåçèéêëìíîïðòóôõöùúûüýÿÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÐÒÓÔÕÖÙÚÛÜÝŸ\-]+$/u', 'max:255'],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['required', 'date', 'after_or_equal:date_debut'],
            'description' => ['required', 'string', 'min:10'],
            'prix' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'support_pdf' => ['nullable', 'mimes:pdf', 'max:10240'],
            'support_video' => ['nullable', 'mimes:mp4,avi,mov', 'max:51200'],
            'equipments' => ['required', 'array'],
            'equipments.*' => ['exists:equipments,id'],
            'equipment_comment' => ['required', 'string'],
            'existing_image' => ['nullable', 'string'],
            'existing_support_pdf' => ['nullable', 'string'],
            'existing_support_video' => ['nullable', 'string'],
        ]);

        // Prepare data for update
        $data = $request->only(['nom', 'date_debut', 'date_fin', 'description', 'prix']);

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($activity->image) {
                Storage::disk('public')->delete($activity->image);
            }
            $data['image'] = $request->file('image')->store('activities/images', 'public');
        } else {
            $data['image'] = $request->input('existing_image', $activity->image);
        }

        // Handle PDF upload
        if ($request->hasFile('support_pdf')) {
            if ($activity->support_pdf) {
                Storage::disk('public')->delete($activity->support_pdf);
            }
            $data['support_pdf'] = $request->file('support_pdf')->store('activities/pdfs', 'public');
        } else {
            $data['support_pdf'] = $request->input('existing_support_pdf', $activity->support_pdf);
        }

        // Handle video upload
        if ($request->hasFile('support_video')) {
            if ($activity->support_video) {
                Storage::disk('public')->delete($activity->support_video);
            }
            $data['support_video'] = $request->file('support_video')->store('activities/videos', 'public');
        } else {
            $data['support_video'] = $request->input('existing_support_video', $activity->support_video);
        }

        // Update the activity
        $activity->update($data);

        // Sync equipments with equipment_comment as commentaire in pivot table
        $activity->equipments()->sync(
            collect($request->equipments)->mapWithKeys(function ($equipmentId) use ($request) {
                return [$equipmentId => ['commentaire' => $request->equipment_comment]];
            })->toArray()
        );

        return redirect()->route('admin.activities.index')->with('updated', 'Activité modifiée avec succès.');
    }

    public function destroy(Activity $activity)
    {
        if ($activity->image) {
            Storage::disk('public')->delete($activity->image);
        }
        if ($activity->support_pdf) {
            Storage::disk('public')->delete($activity->support_pdf);
        }
        if ($activity->support_video) {
            Storage::disk('public')->delete($activity->support_video);
        }

        $activity->delete();
        return redirect()->route('admin.activities.index')->with('success', 'Activité supprimée avec succès.');
    }

  
    public function frontIndex(Request $request)
    {
        $withRelations = ['category', 'equipments', 'likedBy'];

        if (Auth::check()) {
            $withRelations[] = 'paidUsers';
        }

        $query = Activity::with($withRelations);

        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($date = $request->query('date')) {
            $query->whereDate('date_debut', $date);
        }

        $activities = $query->get();

        return view('frontoffice.activities.list', compact('activities'));
    }

    public function detail(Request $request, Activity $activity)
    {
        $hasPaid = false;

        // Si l'utilisateur est connecté, vérifier le paiement
        if (Auth::check()) {
            $userId = Auth::id();
            $hasPaid = $activity->hasPaid($userId);
        }

        // Si l'activité est gratuite (prix == 0 ou null), autoriser l'accès sans authentification
        if (!$activity->prix || $activity->prix == 0) {
            return view('frontoffice.activities.detaill', compact('activity', 'hasPaid'));
        }

        // Pour les activités payantes : vérifier l'authentification et le paiement
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Connectez-vous pour accéder aux détails payants.');
        }

        if ($hasPaid) {
            return view('frontoffice.activities.detaill', compact('activity', 'hasPaid'));
        }

        // Non payé : rediriger vers le paiement
        return redirect()->route('activities.checkout', $activity->id)
                         ->with('error', 'Vous devez payer pour accéder aux détails complets de cette activité.');
    }

    public function createCheckoutSession(Request $request, Activity $activity)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Connectez-vous pour payer.');
        }

        if (!$activity->prix || $activity->prix == 0) {
            return redirect()->route('activities.detail', $activity->id);
        }

        $user = Auth::user();

        \Log::info('Stripe Secret Key: ' . config('services.stripe.secret'));
        \Log::info('Environment STRIPE_SECRET: ' . env('STRIPE_SECRET'));

        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => $activity->nom . ' - Accès aux détails',
                        ],
                        'unit_amount' => $activity->prix * 100, // Prix en centimes
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('activities.checkout.success', $activity->id) . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('activities.front'),
                'customer_email' => $user->email,
                'metadata' => [
                    'activity_id' => $activity->id,
                    'user_id' => $user->id,
                ],
            ]);

            \Log::info('Stripe session created: ' . $session->id);

            return redirect($session->url, 303);
        } catch (AuthenticationException $e) {
            \Log::error('Stripe Authentication Error: ' . $e->getMessage());
            return redirect()->route('activities.front')->with('error', 'Erreur de configuration du paiement. Contactez l\'administrateur.');
        } catch (\Exception $e) {
            \Log::error('Stripe Error: ' . $e->getMessage());
            return redirect()->route('activities.front')->with('error', 'Une erreur est survenue lors du paiement. Réessayez.');
        }
    }

    public function checkoutSuccess(Request $request, Activity $activity)
    {
        $sessionId = $request->get('session_id');
        if (!$sessionId) {
            return redirect()->route('activities.front')->with('error', 'Paiement non confirmé.');
        }

        try {
            Stripe::setApiKey(config('services.stripe.secret'));
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if ($session->payment_status === 'paid' && $session->metadata->activity_id == $activity->id) {
                $user = Auth::user();
                $activity->paidUsers()->attach($user->id, ['session_id' => $sessionId]);
                // Rediriger vers les détails après succès
                return redirect()->route('activities.detail', $activity->id)
                                 ->with('success', 'Paiement réussi ! Accès aux détails débloqué.');
            }
        } catch (\Exception $e) {
            \Log::error('Stripe Success Error: ' . $e->getMessage());
            return redirect()->route('activities.front')->with('error', 'Erreur de vérification du paiement.');
        }

        $adminEmail = 'jihedhorchani@gmail.com'; // <-- change cette adresse
    Mail::to($adminEmail)->send(new AdminActivityPaidMail($activity, $user));

        return redirect()->route('activities.front')->with('error', 'Paiement échoué.');
    }

    public function statistics()
    {
        // Récupère les stats des réservations depuis la table pivot activity_user_payments
        $stats = DB::table('activity_user_payments')
            ->select('activity_id', DB::raw('COUNT(user_id) as reservations'))
            ->groupBy('activity_id')
            ->orderBy('reservations', 'desc')
            ->limit(10) // Top 10 activités les plus réservées
            ->get();

        // Récupère les noms des activités pour les labels du chart
        $activityIds = $stats->pluck('activity_id');
        $activities = Activity::whereIn('id', $activityIds)->get()->keyBy('id');

        $labels = [];
        $data = [];
        foreach ($stats as $stat) {
            $activity = $activities->get($stat->activity_id);
            if ($activity) {
                $labels[] = substr($activity->nom, 0, 20) . (strlen($activity->nom) > 20 ? '...' : ''); // Tronque si trop long
                $data[] = $stat->reservations;
            }
        }

        // Si pas de stats, initialise avec des valeurs vides
        if (empty($labels)) {
            $labels = ['Aucune réservation'];
            $data = [0];
        }

        return view('frontoffice.activities.statistics', compact('labels', 'data'));
    }


    public function like(Request $request, Activity $activity)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Vous devez être connecté pour aimer une activité.',
            ], 401);
        }

        $user = Auth::user();

        \Log::info('Like action called for activity ID: ' . $activity->id . ', User ID: ' . $user->id);

        if ($activity->isLikedByUser($user->id)) {
            $activity->likedBy()->detach($user->id);
            $activity->decrement('likes');
            $isLiked = false;
        } else {
            $activity->likedBy()->attach($user->id);
            $activity->increment('likes');
            $isLiked = true;
        }

        return response()->json([
            'success' => true,
            'likes' => $activity->likes,
            'isLiked' => $isLiked,
        ]);
    }

// Dans ActivityController.php
public function storeComment(Request $request, Activity $activity)
{
    // Validation avec rating
    $validated = $request->validate([
        'comment' => 'required|string|min:1|max:1000',
        'rating' => 'required|integer|min:1|max:5', // ⭐ Ajouter la validation
    ]);

    // Création avec rating
    $activity->comments()->create([
        'comment' => $validated['comment'],
        'rating' => $validated['rating'], // ⭐ Sauvegarder la note
        'user_id' => auth()->id(),
    ]);

    return redirect()->back()->with('success', 'Commentaire et note ajoutés !');
}
public function recommended(Request $request)
{
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login')->with('error', 'Connectez-vous pour voir les recommandations.');
    }

    if ($user->preferences->count() === 0) {
        return redirect()->route('preferences.create')
                         ->with('info', 'Veuillez définir vos préférences pour obtenir des recommandations personnalisées.');
    }

    // Utiliser IARecommendationService
    $recommendationService = new \App\Services\IARecommendationService();
    $activities = $recommendationService->getRecommendedActivities($user);

    return view('frontoffice.activities.recommended', compact('activities', 'user'));
}
}