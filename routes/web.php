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


    Route::resource('evenements', EvenementController::class);
    Route::resource('reservations', ReservationController::class);


    Route::put('/test-email/{id}',[ReservationController::class, 'refuserReservation'])->name('mail');


// Routes pour les idées
// Route::resource('reservations', ReservationController::class);
// Route::post('reservations/{id}/approuvé', [ReservationController::class, 'approveReservations'])->name('reservations.approuvé');
// Route::post('reservations/{id}/refusé', [ReservationController::class, 'rejectReservations'])->name('reservations.refusé');
