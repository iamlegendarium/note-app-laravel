<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
});

// This route handles the dashboard and uses the NoteController to show notes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [NoteController::class, 'index'])->name('dashboard');

    // Notes routes
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
    Route::get('/notes/{id}/edit', [NoteController::class, 'edit'])->name('notes.edit');
    Route::put('/notes/{id}', [NoteController::class, 'update'])->name('notes.update');
    Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
