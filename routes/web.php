<?php

use App\Http\Controllers\CategoryActivityController;

use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

// Public home route
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
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__ . '/auth.php';
