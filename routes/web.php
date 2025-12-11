<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Trasy Admina
Route::get('/admin', [PageController::class, 'adminIndex']);
Route::get('/admin/edit/{id}', [PageController::class, 'adminEdit']);
Route::post('/admin/update/{id}', [PageController::class, 'adminUpdate']);
Route::delete('/admin/delete/{id}', [PageController::class, 'adminDelete']);
Route::get('/admin/create', [PageController::class, 'adminCreate']);
Route::post('/admin/store', [PageController::class, 'adminStore']);

// Trasa Klienta
Route::get('/{slug?}', [PageController::class, 'show']);