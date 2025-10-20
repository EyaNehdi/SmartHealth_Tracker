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

use App\Http\Controllers\CartController;


use App\Http\Controllers\TypeEventController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;
use App\Models\Event;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (No Authentication Required)
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', function () {
    return view('home');
})->name('home');

// Public Events
Route::get('/evenements', [EventController::class, 'frontIndex'])->name('events.front');
Route::post('/evenements/{event}/participate', [EventController::class, 'participate'])
     ->name('events.participate');


// Public Products Store
Route::get('/magasin', [ProduitController::class, 'storeFront'])->name('produits.index');
Route::get('/magasin/{produit}', [ProduitController::class, 'show'])->name('produits.show');
Route::get('/produits/{produit}/pdf', [ProduitController::class, 'downloadPdf'])->name('produits.pdf');

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
    Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
    Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
    Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
    Route::get('/activities/{activity}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
    Route::put('/activities/{activity}', [ActivityController::class, 'update'])->name('activities.update');
    Route::delete('/activities/{activity}', [ActivityController::class, 'destroy'])->name('activities.destroy');

    // User Challenges Management
    Route::get('/challenges', [ChallengeController::class, 'index'])->name('challenges.index');
    Route::get('/challenges/create', [ChallengeController::class, 'create'])->name('challenges.create');
    Route::post('/challenges', [ChallengeController::class, 'store'])->name('challenges.store');
    Route::get('/challenges/{challenge}/edit', [ChallengeController::class, 'edit'])->name('challenges.edit');
    Route::put('/challenges/{challenge}', [ChallengeController::class, 'update'])->name('challenges.update');
    Route::delete('/challenges/{challenge}', [ChallengeController::class, 'destroy'])->name('challenges.destroy');

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
        Route::get('/catActivity/create', function () {
            return view('backoffice.categories.ajoute');
        })->name('categories.create');
        Route::post('/catActivity', [CategoryActivityController::class, 'store'])->name('categories.store');
        Route::get('/catActivity/list', [CategoryActivityController::class, 'index'])->name('categories.list');
        Route::get('/catActivity/{category}/edit', [CategoryActivityController::class, 'edit'])->name('categories.edit');
        Route::put('/catActivity/{category}', [CategoryActivityController::class, 'update'])->name('categories.update');
        Route::delete('/catActivity/{category}', [CategoryActivityController::class, 'destroy'])->name('categories.destroy');

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
    });




// Cart routes
Route::post('/cart/add', [CartController::class, 'add'])->name('panier.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('panier.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('panier.remove');
Route::get('/cart', [CartController::class, 'get'])->name('panier.get');

use Illuminate\Http\Request;
Route::get('/test-session', function(Request $request){
    session()->put('test', 'ok');
    return session()->all();
});

// Route::get('/clear-cart', function () {
//     session()->forget('cart');
//     return 'Panier vidé !';
// });



require __DIR__ . '/auth.php';
