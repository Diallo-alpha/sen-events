<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\RoleController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admins')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

    Route::middleware('auth:admins')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('association', [AdminController::class, 'association'])->name('association');
        Route::get('evenements', [AdminController::class, 'evenements'])->name('evenements');
        Route::get('utilisateurs', [AdminController::class, 'utilisateur'])->name('utilisateurs');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::prefix('roles')->name('roles.')->group(function () {
            Route::get('create', [RoleController::class, 'create'])->name('create');
            Route::post('store', [RoleController::class, 'store'])->name('store');
            Route::post('assignRoleToUser', [RoleController::class, 'assignRoleToUser'])->name('assignRoleToUser');
            Route::post('{role}/permissions', [RoleController::class, 'assignPermission'])->name('assignPermission');
            Route::delete('{role}', [RoleController::class, 'destroy'])->name('destroy');
        });

        Route::delete('utilisateurs/{id}', [AdminController::class, 'deleteUser'])->name('utilisateurs.delete');
        Route::delete('associations/{id}', [AdminController::class, 'deleteAssociation'])->name('associations.delete');
        Route::delete('/utilisateurs/{id}', [AdminController::class, 'deleteUser'])->name('utilisateurs.delete');
        Route::delete('/associations/{id}', [AdminController::class, 'deleteAssociation'])->name('associations.delete');
        Route::patch('/associations/{id}/toggle', [AdminController::class, 'toggleAssociation'])->name('associations.toggle');
        Route::delete('/associations/{id}', [AdminController::class, 'deleteAssociation'])->name('associations.delete');
    });
});

