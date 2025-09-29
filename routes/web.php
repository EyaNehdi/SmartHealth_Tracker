<?php

use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




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
})->middleware(['auth', 'verified'])->name('dashboard');

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
