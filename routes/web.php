<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ProfileController;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [EventsController::class, 'allEvents'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Admin panel for creating events
    Route::get('/dashboard/events/all', [EventsController::class, 'ourEvents'])->name('events.all'); // show only $events->user_id->company_id

    // add verification for the 5 routes below
    Route::get('/dashboard/events/create', [EventsController::class, 'create'])->name('events.create');
    Route::post('/events', [EventsController::class, 'store'])->name('events.store');

    // Event edit admin panel
    Route::get('/events/{event}/edit', [EventsController::class, 'edit'])->name('events.edit'); // when dashboard works could a user from brainster edit an event from other organisaton
    Route::put('/events/{event}', [EventsController::class, 'update'])->name('events.update');

    // new feature destroy (how does it work???)
    Route::resource('events', EventsController::class);
});

require __DIR__.'/auth.php';


// UI view
Route::get('/', [EventsController::class, 'index'])->name('events.calendar');
