<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortailController;
use App\Http\Controllers\EvenementController;


Route::get('/', [PortailController::class, 'index'])->name('portail.index');

Route::get('/detailes-evenements/{id}', [PortailController::class, 'details'])->name('details.events');


require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
require __DIR__.'/organisme.php';
require __DIR__.'/evenement.php';



Route::put('/test-email',[Controller::class, 'update'])->name('mail');
