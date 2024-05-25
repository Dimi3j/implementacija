<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/events/create', [EventsController::class, 'create'])->name('events.create');
Route::post('/events', [EventsController::class, 'store'])->name('events.store');

Route::get('/welcome-page', function () {
    return view('welcome-page');
});
