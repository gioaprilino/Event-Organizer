<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::resource('events', EventController::class);
Route::get('events-deleted', [EventController::class, 'deleted'])->name('events.deleted');
Route::post('events/{id}/restore', [EventController::class, 'restore'])->name('events.restore');

