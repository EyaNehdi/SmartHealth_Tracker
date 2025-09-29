<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ParticipationController;


Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Challenge Routes

     Route::get('/challenges', [ChallengeController::class, 'index'])->name('challenges.index');
    Route::get('/challenges/create', [ChallengeController::class, 'create'])->name('challenges.create');
    Route::post('/challenges', [ChallengeController::class, 'store'])->name('challenges.store');
     Route::get('/challenges/{challenge}/edit', [ChallengeController::class, 'edit'])->name('challenges.edit');
    Route::put('/challenges/{challenge}', [ChallengeController::class, 'update'])->name('challenges.update');
    Route::delete('/challenges/{challenge}', [ChallengeController::class, 'destroy'])->name('challenges.destroy');

// participation routes
 Route::get('/participations', [ParticipationController::class, 'index'])->name('participations.index');
    Route::get('/participations/create', [ParticipationController::class, 'create'])->name('participations.create');
    Route::post('/participations', [ParticipationController::class, 'store'])->name('participations.store');
    Route::get('/participations/{participation}', [ParticipationController::class, 'show'])->name('participations.show');
    Route::get('/participations/{participation}/edit', [ParticipationController::class, 'edit'])->name('participations.edit');
    Route::put('/participations/{participation}', [ParticipationController::class, 'update'])->name('participations.update');
    Route::delete('/participations/{participation}', [ParticipationController::class, 'destroy'])->name('participations.destroy');
Route::put('/participation/{participation}/reply', [ParticipationController::class, 'reply'])->name('participation.reply');
Route::put('/participation/{participation}/participant-reply', [ParticipationController::class, 'participantReply'])->name('participation.participant_reply');



});


require __DIR__.'/auth.php';
