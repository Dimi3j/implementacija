<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;

Route::get('/testing', function () {
    return view('welcome-page');
});

// Admin panel for creating events
Route::get('/events/create', [EventsController::class, 'create'])->name('events.create');
Route::post('/events', [EventsController::class, 'store'])->name('events.store');

// UI view
Route::get('/events-calendar', [EventsController::class, 'index'])->name('events.calendar');
