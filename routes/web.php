<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/categories/create', function () {
    return view('categories.ajout');
})->name('categories.create');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('/list', [CategoryController::class, 'index'])->name('categories.list');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');



//Route de activities

Route::get('/activities/create', [ActivityController::class, 'create'])->middleware(['auth', 'verified'])->name('activities.create');
Route::post('/activities', [ActivityController::class, 'store'])->middleware(['auth', 'verified'])->name('activities.store');
Route::get('/activities', [ActivityController::class, 'index'])->middleware(['auth', 'verified'])->name('activities.index');
Route::delete('/activities/{activity}', [ActivityController::class, 'destroy'])->middleware(['auth', 'verified'])->name('activities.destroy');
Route::get('/activities/{activity}/edit', [ActivityController::class, 'edit'])->middleware(['auth', 'verified'])->name('activities.edit');
Route::put('/activities/{activity}', [ActivityController::class, 'update'])->middleware(['auth', 'verified'])->name('activities.update');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';