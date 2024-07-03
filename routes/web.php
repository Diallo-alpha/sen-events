<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PortailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\OrganismeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReservationController;


/**route portail*/
Route::get('/', [PortailController::class, 'index'])->name('portail.index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth:web')->group(function () {
    Route::get('/detailes-evenements', [PortailController::class, 'details'])->name('details.events');

});

require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
require __DIR__.'/organisme.php';



// Route::resource('organismes', OrganismeController::class);
Route::resource('users', UserController::class);
// Route::resource('evenements', EvenementController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('organismes', OrganismeController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('roles', RoleController::class);

Route::resource('evenements', EvenementController::class);
