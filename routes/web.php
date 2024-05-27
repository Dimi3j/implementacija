<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ProfileController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Admin panel for creating events
Route::get('/dashboard/events/all', [EventsController::class, 'allEvents'])->name('events.all'); //add middleware auth

Route::get('/dashboard/events/create', [EventsController::class, 'create'])->name('events.create'); //add middleware auth
Route::post('/events', [EventsController::class, 'store'])->name('events.store'); //add middleware auth?? not sure about here

// Event edit admin panel
Route::get('/events/{event}/edit', [EventsController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventsController::class, 'update'])->name('events.update');

// new feature
Route::resource('events', EventsController::class); //middleware auth??

// UI view
Route::get('/', [EventsController::class, 'index'])->name('events.calendar');

