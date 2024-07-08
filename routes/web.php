<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortailController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ReservationController;

Route::get('/', [PortailController::class, 'index'])->name('portail.index');

Route::get('/detailes-evenements/{id}', [PortailController::class, 'details'])->name('details.events');


require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
require __DIR__.'/organisme.php';
require __DIR__.'/evenement.php';



// Approval and Rejection routes



Route::put('reservation/{id}/approve', [ReservationController::class, 'approveReservation'])->name('reservation.approve');
Route::put('reservation/{id}/reject', [ReservationController::class, 'rejectReservation'])->name('reservation.reject');
Route::get('reservations/count/{evenementId}', [ReservationController::class, 'getReservationCount']);
// Route::put('reservation/{id}/approve', [ReservationController::class, 'approveReservation'])->name('reservation.approve');
// Route::put('reservation/{id}/reject', [ReservationController::class, 'rejectReservation'])->name('reservation.reject');

// Display routes
Route::get('/evenements/{id}/reservations/acceptees', [ReservationController::class, 'showAcceptedReservations'])->name('reservations.accepted');
Route::get('/evenements/{id}/reservations/refusees', [ReservationController::class, 'showRejectedReservations'])->name('reservations.rejected');

