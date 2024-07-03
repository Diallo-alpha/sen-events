<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrganismeController;

// Route::get('/', function()
//     {
//         return view('evenements.create');
//     });
/**route portail*/
Route::get('/', [PortailController::class, 'index'])->name('portail.index');

 Route::get('/detailes-evenements', [PortailController::class, 'details'])->name('details.events');



require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
require __DIR__.'/organisme.php';
require __DIR__.'/evenement.php';
