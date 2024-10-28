<?php


use App\Http\Controllers\WinController;

Route::get('/app', [WinController::class, 'index'])->name('app'); 

// Other routes
Route::resource('wins', WinController::class);
Route::post('/app', [WinController::class, 'store'])->name('app.store');

