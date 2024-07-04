<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortailController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ReservationController;


// Route::get('/', function()
//     {
//         return view('evenements.create');
//     });
/**route portail*/
Route::get('/', [PortailController::class, 'index'])->name('portail.index');

 Route::get('/detailes-evenements/{id}', [PortailController::class, 'details'])->name('details.events');



require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
require __DIR__.'/organisme.php';
require __DIR__.'/evenement.php';



// Route::resource('reservations', ReservationController::class);





Route::get('/evenement/{id}', [EvenementController::class, 'show'])->name('evenement.show');


// Route::middleware(['auth'])->group(function () {
    Route::resource('evenements', EvenementController::class);
    Route::resource('reservations', ReservationController::class);
// });
