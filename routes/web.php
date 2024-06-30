<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganismeController;

Route::get('/', function () {
    return view('login');
});


Route::resource('associations', OrganismeController::class);
