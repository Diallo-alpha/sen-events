<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganismeController;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
require __DIR__.'/organisme.php';

Route::resource('organismes', OrganismeController::class);

// Route::get('organismes', [OrganismeController::class, 'index'])->name('organismes.index');
// Route::get('organismes/create', [OrganismeController::class, 'create'])->name('organismes.create');
// Route::post('organismes', [OrganismeController::class, 'store'])->name('organismes.store');
// Route::get('organismes/{organisme}', [OrganismeController::class, 'show'])->name('organismes.show');
// Route::get('organismes/{organisme}/edit', [OrganismeController::class, 'edit'])->name('organismes.edit');
// Route::put('organismes/{organisme}', [OrganismeController::class, 'update'])->name('organismes.update');
// Route::patch('organismes/{organisme}', [OrganismeController::class, 'update'])->name('organismes.update');
// Route::delete('organismes/{organisme}', [OrganismeController::class, 'destroy'])->name('organismes.destroy');
