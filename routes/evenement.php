<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;


Route::middleware(['auth:organisme'])->group(function () {
    Route::resource('evenement', EvenementController::class);
});
// Route::get('/evenement/{id}', [EvenementController::class, 'show'])->name('evenement.show');
Route::resource('evenements', EvenementController::class);
