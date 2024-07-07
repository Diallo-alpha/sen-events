<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ReservationController;

// Routes pour les invités (non authentifiés)
Route::middleware('guest:web,guest:admins,guest:organisme')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// Routes pour les utilisateurs authentifiés
Route::middleware('auth:web')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::resource('reservations', ReservationController::class);
    Route::get('/portail', function () {
        return view('portail.index');
    })->name('portail.index');
});

Route::middleware('auth:admins')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware('auth:organisme')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('organisme.logout');
    Route::get('/organisme/dashboard', function () {
        return view('organisme.dashboard');
    })->name('organisme.dashboard');
});
