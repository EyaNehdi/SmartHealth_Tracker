<?php

use App\Http\Controllers\CategoryActivityController;

use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');




use App\Http\Controllers\TypeEventController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Carbon;
use App\Models\Event;

Route::get('/upcoming-events', function () {
    $date = Carbon::now()->addDays(3)->toDateString();
    $events = Event::whereDate('date', $date)->get();
    return response()->json($events);
})->middleware('auth'); // uniquement pour les utilisateurs connectés

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('events', EventController::class);
    Route::resource('type_events', TypeEventController::class);
});


Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/admin', function () {
    return view('components.homeadmin');
})->name('admin');


//Route de Category

Route::get('/catActivity/create', function () {
    return view('categories.ajout');
})->name('categories.create');
Route::get('/catActivity/{category}/edit', [CategoryActivityController::class, 'edit'])->name('categories.edit');
Route::put('/catActivity/{category}', [CategoryActivityController::class, 'update'])->name('categories.update');
Route::delete('/catActivity/{category}', [CategoryActivityController::class, 'destroy'])->name('categories.destroy');
Route::get('/list', [CategoryActivityController::class, 'index'])->name('categories.list');
Route::post('/catActivity', [CategoryActivityController::class, 'store'])->name('categories.store');



//Route de activities

Route::get('/activities/create', [ActivityController::class, 'create'])->middleware(['auth', 'verified'])->name('activities.create');
Route::post('/activities', [ActivityController::class, 'store'])->middleware(['auth', 'verified'])->name('activities.store');
Route::get('/activities', [ActivityController::class, 'index'])->middleware(['auth', 'verified'])->name('activities.index');
Route::delete('/activities/{activity}', [ActivityController::class, 'destroy'])->middleware(['auth', 'verified'])->name('activities.destroy');
Route::get('/activities/{activity}/edit', [ActivityController::class, 'edit'])->middleware(['auth', 'verified'])->name('activities.edit');
Route::put('/activities/{activity}', [ActivityController::class, 'update'])->middleware(['auth', 'verified'])->name('activities.update');


// admin protected routes
Route::prefix('admin')
    ->middleware(['auth', 'verified'])
    ->name('admin.')
    ->group(function () {

        // Admin dashboard/homepage
        Route::get('/', function () {
            return view('admin.homeadmin');
        })->name('adminPanel');



        // Food routes
        Route::get('/food/add', function () {
            return view('admin.food.add-food');
        })->name('food.add');
        Route::get('/food/list', [FoodItemController::class, 'foodList'])->name('food.list');
        Route::post('/food/store', [FoodItemController::class, 'store'])->name('food.store');
        Route::get('/food/{food}', [FoodItemController::class, 'show'])->name('food.show');
        Route::get('/food/{food}/edit', [FoodItemController::class, 'edit'])->name('food.edit');
        Route::delete('/food/{food}', [FoodItemController::class, 'destroy'])->name('food.destroy');

        // ----------------- Catégorie routes -----------------
        Route::get('/categories/add', [CategorieController::class, 'create'])->name('categories.add');
        Route::get('/categories/list', [CategorieController::class, 'index'])->name('categories.list');
        Route::post('/categories/store', [CategorieController::class, 'store'])->name('categories.store');
        Route::get('/categories/{categorie}', [CategorieController::class, 'show'])->name('categories.show');
        Route::get('/categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');

        // ----------------- Produit routes -----------------
        Route::get('/produits/add', [ProduitController::class, 'create'])->name('produits.add');
        Route::get('/produits/list', [ProduitController::class, 'index'])->name('produits.list');
        Route::post('/produits/store', [ProduitController::class, 'store'])->name('produits.store');
        Route::get('/produits/{produit}', [ProduitController::class, 'show'])->name('produits.show');
        Route::get('/produits/{produit}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
        Route::put('/produits/{produit}', [ProduitController::class, 'update'])->name('produits.update');
        Route::delete('/produits/{produit}', [ProduitController::class, 'destroy'])->name('produits.destroy');

    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__ . '/auth.php';
