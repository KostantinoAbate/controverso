<?php

use App\Http\Controllers\Landing\ComplianceController;
use App\Http\Controllers\Landing\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth/fortify.php';

Route::name('landing.')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::name('compliance.')->group(function () {
        Route::get('/termini-e-condizioni', [ComplianceController::class, 'terms'])->name('terms');
        Route::get('/privacy-policy', [ComplianceController::class, 'privacy'])->name('privacy');
        Route::get('/cookie-policy', [ComplianceController::class, 'cookie'])->name('cookie');
        Route::get('/note-legali', [ComplianceController::class, 'legal'])->name('legal');
        Route::get('/preferenze-cookie', [ComplianceController::class, 'preferences'])->name('preferences');
    });
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/profilo', [ProfileController::class, 'profile'])->name('profile');
        Route::get('/profilo/verifica', [ProfileController::class, 'verify'])->name('profile.verify');
        Route::get('/profilo/cambia-password', [ProfileController::class, 'password'])->name('profile.password');
    });
});
