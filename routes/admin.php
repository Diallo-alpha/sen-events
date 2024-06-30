<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admins')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

    Route::middleware('auth:admins')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/association', [AdminController::class, 'association'])->name('association');
        Route::get('/evenements', [AdminController::class, 'evenements'])->name('evenements');
        Route::get('/utilisateurs', [AdminController::class, 'utilisateur'])->name('utilisateurs');
    });
});
