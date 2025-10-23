<?php

// Import Controllers
use App\Http\Controllers\CategoryActivityController;
use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\PreferenceController;

use App\Http\Controllers\StripeController;
use App\Http\Controllers\CartController;


use App\Http\Controllers\TypeEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MealPlanController;
use App\Http\Controllers\FoodMealsDashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;
use App\Models\Event;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NotificationController;
/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (No Authentication Required)
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', function () {
    // Check if user is logged in
    if (Auth::check()) {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.adminPanel');
        }
    }

    // If not logged in
    return view('home');
})->name('home');

// Route::get('/home', function () {
//     return view('home');
// })->name('home');

Route::get('/switch-interface', function () {
    // Ensure user is authenticated
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    // Store the current interface in session and toggle it
    $current = Session::get('interface', 'frontoffice');
    $new = $current === 'frontoffice' ? 'backoffice' : 'frontoffice';
    Session::put('interface', $new);

    // Redirect accordingly
    if ($new === 'backoffice') {
        return redirect()->route('admin.adminPanel');
    } else {
        return redirect()->route('home');
    }
})->name('switch.interface');

// In routes/web.php
Route::middleware('auth')->group(function () {
    Route::post('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
});
// Public Events
Route::get('/evenements', [EventController::class, 'frontIndex'])->name('events.front');
Route::post('/evenements/{event}/participate', [EventController::class, 'participate'])
    ->name('events.participate');


// Public Products Store
Route::get('/magasin', [ProduitController::class, 'storeFront'])->name('produits.index');
Route::get('/magasin/{produit}', [ProduitController::class, 'show'])->name('produits.show');
Route::get('/produits/{produit}/pdf', [ProduitController::class, 'downloadPdf'])->name('produits.pdf');

// Public Meals and Meal Plans
Route::get('/repas', [MealController::class, 'frontIndex'])->name('meals.front.index');
Route::get('/repas/{id}', [MealController::class, 'frontShow'])->name('meals.front.show');
Route::get('/plans-de-repas', [MealPlanController::class, 'frontIndex'])->name('meal-plans.front.index');
Route::get('/plans-de-repas/{id}', [MealPlanController::class, 'frontShow'])->name('meal-plans.front.show');

// Authenticated Meals Routes
Route::middleware('auth')->group(function () {
    // Meal Management
    Route::get('/mes-repas/creer', [MealController::class, 'frontCreate'])->name('meals.front.create');
    Route::post('/mes-repas', [MealController::class, 'frontStore'])->name('meals.front.store');
    Route::get('/mes-repas/{id}/modifier', [MealController::class, 'frontEdit'])->name('meals.front.edit');
    Route::put('/mes-repas/{id}', [MealController::class, 'frontUpdate'])->name('meals.front.update');
    Route::delete('/mes-repas/{id}', [MealController::class, 'frontDestroy'])->name('meals.front.destroy');
    
    // Save/Unsave Meals
    Route::post('/repas/{id}/sauvegarder', [MealController::class, 'saveMeal'])->name('meals.save');
    Route::delete('/repas/{id}/retirer', [MealController::class, 'unsaveMeal'])->name('meals.unsave');
    
    // Meal Plan Management
    Route::get('/mes-plans-de-repas/creer', [MealPlanController::class, 'frontCreate'])->name('meal-plans.front.create');
    Route::post('/mes-plans-de-repas', [MealPlanController::class, 'frontStore'])->name('meal-plans.front.store');
    Route::get('/mes-plans-de-repas/{id}/modifier', [MealPlanController::class, 'frontEdit'])->name('meal-plans.front.edit');
    Route::put('/mes-plans-de-repas/{id}', [MealPlanController::class, 'frontUpdate'])->name('meal-plans.front.update');
    Route::delete('/mes-plans-de-repas/{id}', [MealPlanController::class, 'frontDestroy'])->name('meal-plans.front.destroy');
    
    // Save/Unsave Meal Plans
    Route::post('/plans-de-repas/{id}/sauvegarder', [MealPlanController::class, 'saveMealPlan'])->name('meal-plans.save');
    Route::delete('/plans-de-repas/{id}/retirer', [MealPlanController::class, 'unsaveMealPlan'])->name('meal-plans.unsave');
});

// Public Categories
Route::get('/list', [CategoryActivityController::class, 'index'])->name('categories.list');
Route::get('/catActivity/create', function () {
    return view('frontoffice.categories.Ajout');
})->name('categories.create');
Route::post('/catActivity', [CategoryActivityController::class, 'store'])->name('categories.store');
Route::get('/catActivity/{category}/edit', [CategoryActivityController::class, 'edit'])->name('categories.edit');
Route::put('/catActivity/{category}', [CategoryActivityController::class, 'update'])->name('categories.update');
Route::delete('/catActivity/{category}', [CategoryActivityController::class, 'destroy'])->name('categories.destroy');

// API Routes for Public Access
Route::get('/upcoming-events', function () {
    $date = Carbon::now()->addDays(3)->toDateString();
    $events = Event::whereDate('date', $date)->get();
    return response()->json($events);
})->middleware('auth'); // Only for authenticated users

/*
|--------------------------------------------------------------------------
| AUTHENTICATED USER ROUTES (Auth Required)
|--------------------------------------------------------------------------
*/






Route::middleware(['auth', 'verified'])->group(function () {
    // User Activities Management


    // User Challenges Management
    Route::get('/challenges', [ChallengeController::class, 'index'])->name('challenges.index');
    Route::get('/challenges/create', [ChallengeController::class, 'create'])->name('challenges.create');
    Route::post('/challenges', [ChallengeController::class, 'store'])->name('challenges.store');
    Route::get('/challenges/{challenge}/edit', [ChallengeController::class, 'edit'])->name('challenges.edit');
    Route::put('/challenges/{challenge}', [ChallengeController::class, 'update'])->name('challenges.update');
    Route::delete('/challenges/{challenge}', [ChallengeController::class, 'destroy'])->name('challenges.destroy');


Route::get('/activities/front', [ActivityController::class, 'frontIndex'])->name('activities.front');
Route::get('/activities', [ActivityController::class, 'frontIndex'])->name('activities.front');
Route::get('/detail/{activity}', [ActivityController::class, 'detail'])->name('activities.detail');
Route::post('/activities/{activity}/like', [ActivityController::class, 'like'])->name('activities.like');
Route::get('/activities/{activity}/checkout', [ActivityController::class, 'createCheckoutSession'])->name('activities.checkout');
Route::get('/activities/{activity}/checkout/success', [ActivityController::class, 'checkoutSuccess'])->name('activities.checkout.success');
Route::get('/activities/front/statistics', [ActivityController::class, 'statistics'])->name('activities.statistics');
Route::post('/activities/{activity}/comments', [ActivityController::class, 'storeComment'])->name('activities.comments.store'); 
Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
Route::get('/preferences', [PreferenceController::class, 'create'])->name('preferences.create');
Route::post('/preferences', [PreferenceController::class, 'store'])->name('preferences.store');
Route::get('/activities/recommended', [ActivityController::class, 'recommended'])->name('activities.recommended');

// User Participations Management
    Route::get('/participations', [ParticipationController::class, 'index'])->name('participations.index');
    Route::get('/participations/create', [ParticipationController::class, 'create'])->name('participations.create');
    Route::post('/participations', [ParticipationController::class, 'store'])->name('participations.store');
    Route::get('/participations/{participation}', [ParticipationController::class, 'show'])->name('participations.show');
    Route::get('/participations/{participation}/edit', [ParticipationController::class, 'edit'])->name('participations.edit');
    Route::put('/participations/{participation}', [ParticipationController::class, 'update'])->name('participations.update');
    Route::delete('/participations/{participation}', [ParticipationController::class, 'destroy'])->name('participations.destroy');

    // Participation Actions
    Route::put('/participation/{participation}/reply', [ParticipationController::class, 'reply'])->name('participation.reply');
    Route::put('/participation/{participation}/participant-reply', [ParticipationController::class, 'participantReply'])->name('participation.participant_reply');

    // User Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'send'])->name('messages.send');
    // ... Existing routes ...

    // Group chat for challenges
    Route::get('/challenges/{challenge}/chat', [MessageController::class, 'groupIndex'])->name('challenges.chat');
    Route::post('/challenges/{challenge}/messages', [MessageController::class, 'sendGroup'])->name('challenges.messages.send');
    Route::get('/groups', [ChallengeController::class, 'groups'])->name('groups.index');
    Route::get('/challenges/{id}/messages', [MessageController::class, 'getMessages'])->name('challenges.messages')->middleware('auth');
    Route::put('/challenges/{challenge}', [ChallengeController::class, 'update'])->name('challenges.update');

    // Contact route
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (Auth + Verified Required)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth', 'verified'])
    ->name('admin.')
    ->group(function () {

        // Admin Dashboard
        Route::get('/', function () {
            return view('backoffice.dashboard.homeadmin');
        })->name('adminPanel');

        /*
        |--------------------------------------------------------------------------
        | FOOD MANAGEMENT
        |--------------------------------------------------------------------------
        */

        Route::get('/food/add', function () {
            return view('backoffice.food.add-food');
        })->name('food.add');

        Route::get('/food/list', [FoodItemController::class, 'foodList'])->name('food.list');
        Route::post('/food/store', [FoodItemController::class, 'store'])->name('food.store');
        Route::get('/food/{food}', [FoodItemController::class, 'showView'])->name('food.show');
        Route::get('/food/{food}/edit', [FoodItemController::class, 'edit'])->name('food.edit');
        Route::put('/food/{food}', [FoodItemController::class, 'update'])->name('food.update');
        Route::delete('/food/{food}', [FoodItemController::class, 'destroy'])->name('food.destroy');

        /*
        |--------------------------------------------------------------------------
        | MEALS MANAGEMENT
        |--------------------------------------------------------------------------
        */
        Route::get('/meals', [MealController::class, 'listView'])->name('meals.list');
        Route::get('/meals/create', [MealController::class, 'create'])->name('meals.create');
        Route::post('/meals/store', [MealController::class, 'store'])->name('meals.store');
        Route::get('/meals/{meal}', [MealController::class, 'showView'])->name('meals.show');
        Route::get('/meals/{meal}/edit', [MealController::class, 'edit'])->name('meals.edit');
        Route::put('/meals/{meal}', [MealController::class, 'update'])->name('meals.update');
        Route::delete('/meals/{meal}', [MealController::class, 'destroy'])->name('meals.destroy');
        // Ingredient Management Routes
        Route::post('/meals/{meal}/add-ingredient', [MealController::class, 'addIngredient'])->name('meals.add-ingredient');
        Route::delete('/meals/{meal}/remove-ingredient/{foodItem}', [MealController::class, 'removeIngredient'])->name('meals.remove-ingredient');
        Route::get('/meals/{meal}/ingredients-list', [MealController::class, 'ingredientsList'])->name('meals.ingredients-list');


        Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
        Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
        Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
        Route::get('/activities/{activity}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
        Route::put('/activities/{activity}', [ActivityController::class, 'update'])->name('activities.update');
        Route::delete('/activities/{activity}', [ActivityController::class, 'destroy'])->name('activities.destroy');

        /*
        |--------------------------------------------------------------------------
        | CATEGORIES MANAGEMENT
        |--------------------------------------------------------------------------
        */
        Route::get('/categories/add', [CategorieController::class, 'create'])->name('categories.add');
        Route::get('/categories/list', [CategorieController::class, 'index'])->name('categories.list');
        Route::post('/categories/store', [CategorieController::class, 'store'])->name('categories.store');
        Route::get('/categories/{categorie}', [CategorieController::class, 'show'])->name('categories.show');
        Route::get('/categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');

        // Alternative Category Routes (Legacy) - Admin specific


        /*
        |--------------------------------------------------------------------------
        | EQUIPMENTS MANAGEMENT
        |--------------------------------------------------------------------------
        */
        Route::get('/equipments/create', [EquipmentController::class, 'create'])->name('equipments.create');
        Route::post('/equipments', [EquipmentController::class, 'store'])->name('equipments.store');
        Route::get('/equipments/list', [EquipmentController::class, 'index'])->name('equipments.list');
        Route::get('/equipments/{equipment}/edit', [EquipmentController::class, 'edit'])->name('equipments.edit');
        Route::put('/equipments/{equipment}', [EquipmentController::class, 'update'])->name('equipments.update');
        Route::delete('/equipments/{equipment}', [EquipmentController::class, 'destroy'])->name('equipments.destroy');

        /*
        |--------------------------------------------------------------------------
        | EVENTS MANAGEMENT
        |--------------------------------------------------------------------------
        */
        Route::resource('events', EventController::class);
        Route::get('events/create', [EventController::class, 'create'])->name('events.create');

        /*
        |--------------------------------------------------------------------------
        | EVENT TYPES MANAGEMENT
        |--------------------------------------------------------------------------
        */
        Route::resource('type_events', TypeEventController::class);

        /*
        |--------------------------------------------------------------------------
        | MEAL PLANS MANAGEMENT
        |--------------------------------------------------------------------------
        */
        // Custom routes (must be defined before resource routes to avoid conflicts)
        Route::patch('/meal-plans/{mealPlan}/toggle-active', [MealPlanController::class, 'toggleActive'])->name('meal-plans.toggle-active');
        Route::delete('/meal-plans/{mealPlan}/assignments/{assignment}', [MealPlanController::class, 'removeMealAssignment'])->name('meal-plans.remove-assignment');

        // Standard resource routes
        Route::resource('meal-plans', MealPlanController::class)->names([
            'index' => 'meal-plans.list',
            'create' => 'meal-plans.create',
            'store' => 'meal-plans.store',
            'show' => 'meal-plans.show',
            'edit' => 'meal-plans.edit',
            'update' => 'meal-plans.update',
            'destroy' => 'meal-plans.destroy',
        ]);

        /*
        |--------------------------------------------------------------------------
        | PRODUCTS MANAGEMENT
        |--------------------------------------------------------------------------
        */
        Route::get('/produits/add', [ProduitController::class, 'create'])->name('produits.add');
        Route::get('/produits/list', [ProduitController::class, 'index'])->name('produits.list');
        Route::post('/produits/store', [ProduitController::class, 'store'])->name('produits.store');
        Route::get('/produits/{produit}', [ProduitController::class, 'show'])->name('produits.show');
        Route::get('/produits/{produit}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
        Route::put('/produits/{produit}', [ProduitController::class, 'update'])->name('produits.update');
        Route::delete('/produits/{produit}', [ProduitController::class, 'destroy'])->name('produits.destroy');

        Route::get('/challenges', [ChallengeController::class, 'indexAdmin'])->name('challenges.index');
        Route::get('challenges/add', [ChallengeController::class, 'createAdmin'])->name('backoffice.challenges.add');
        Route::post('/challenges', [ChallengeController::class, 'storeadmin'])->name('challenges.store');

        Route::delete('/challenges/{challenge}', [ChallengeController::class, 'adminDestroy'])->name('challenges.destroy');
        Route::patch('/challenges/{challenge}/toggle-famous', [ChallengeController::class, 'toggleFamous'])->name('challenges.toggleFamous');
    });




// Cart routes
Route::post('/cart/add', [CartController::class, 'add'])->name('panier.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('panier.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('panier.remove');
Route::get('/cart', [CartController::class, 'get'])->name('panier.get');
// panier paiement
Route::get('/panier', [PanierController::class, 'show'])->name('panier.page');
//Stripe route pour magasin
Route::post('/checkout/create-session', [StripeController::class, 'createCheckoutSession'])->name('checkout.create');
Route::get('/checkout/success', [StripeController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [StripeController::class, 'cancel'])->name('checkout.cancel');

Route::get('/panier/test', function () {
    return session('panier', []);
});

use Illuminate\Http\Request;

Route::get('/test-session', function (Request $request) {
    session()->put('test', 'ok');
    return session()->all();
});

// Route::get('/clear-cart', function () {
//     session()->forget('cart');
//     return 'Panier vidé !';
// });



require __DIR__ . '/auth.php';
