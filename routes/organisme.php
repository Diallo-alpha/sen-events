<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Organisme\Auth\RegisteredUserController;
use App\Http\Controllers\Organisme\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Organisme\OrganismeController;

Route::prefix('organisme')->name('organisme.')->group(function () {
    Route::middleware('guest:organisme')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
        Route::get('register', [RegisteredUserController::class, 'createOrganisme'])->name('register');
        Route::post('register', [RegisteredUserController::class, 'storeOrganisme'])->name('store');
    });

    Route::middleware('auth:organisme')->group(function () {
        Route::get('dashboard', [OrganismeController::class, 'index'])->name('dashboard');
        Route::get('evenements', [OrganismeController::class, 'evenements'])->name('evenements');
        Route::get('/evenements/{evenementId}/inscrit', [OrganismeController::class, 'inscrit'])->name('inscrit');
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});
