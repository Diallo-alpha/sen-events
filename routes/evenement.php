<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;


Route::middleware(['auth', 'organisme'])->group(function () {
    Route::resource('evenement', EvenementController::class);
});
