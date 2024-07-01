<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\OrganismeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReservationController;





Route::get('/', function () {
    return view('login');
});


// Route::resource('organismes', OrganismeController::class);


Route::resource('users', UserController::class);
Route::resource('evenements', EvenementController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('organismes', OrganismeController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('roles', RoleController::class);



