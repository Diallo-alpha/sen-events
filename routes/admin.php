<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\RoleController;

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

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
        Route::post('roles/{role}/permissions', [RoleController::class, 'assignPermission'])->name('roles.assignPermission');
        Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
        Route::delete('/utilisateurs/{id}', [AdminController::class, 'deleteUser'])->name('utilisateurs.delete');
        Route::delete('/associations/{id}', [AdminController::class, 'deleteAssociation'])->name('associations.delete');
        Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');
        Route::post('roles/assignRoleToUser', [RoleController::class, 'assignRoleToUser'])->name('roles.assignRoleToUser');
        Route::post('roles/assignPermission/{role}', [RoleController::class, 'assignPermission'])->name('roles.assignPermission');
        Route::delete('roles/destroy/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

    });

    });
// });
