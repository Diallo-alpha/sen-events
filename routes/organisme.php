<?php
use App\Http\Controllers\Organisme\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Organisme\Auth\ProfileController;
use App\Http\Controllers\Organisme\Auth\PasswordController;

Route::prefix('organisme')->name('organisme.')->group(function () {
    Route::middleware('guest:organisme')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

    Route::middleware('auth:organisme')->group(function () {
        Route::get('dashboard', function () {
            return view('organisme.dashboard');
        })->name('dashboard');

        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');

        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});
