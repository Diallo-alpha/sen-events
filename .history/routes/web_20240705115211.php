<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortailController;
use App\Http\Controllers\ReservationController;


Route::get('/', [PortailController::class, 'index'])->name('portail.index');

Route::get('/detailes-evenements/{id}', [PortailController::class, 'details'])->name('details.events');


require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
require __DIR__.'/organisme.php';
require __DIR__.'/evenement.php';



Route::put('reservation/{id}',[ReservationController::class, 'update'])->name('mail');
Route::resource('reservations', ReservationController::class);


Route::put('reservation/{id}/approve', [ReservationController::class, 'approveReservation'])->name('approveReservation');
Route::put('reservation/{id}/reject', [ReservationController::class, 'rejectReservation'])->name('rejectReservation');
Route::resource('reservations', ReservationController::class);
