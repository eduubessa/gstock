<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

Route::middleware(['guest', 'throttle:1000,1'])->prefix('auth')->group(function () {
    Route::get('sign-up', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('sign-up', [RegisteredUserController::class, 'store'])->name('register.submit');
    Route::get('sign-in', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('sign-in', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('guest')->prefix('account')->group(function () {
    Route::get('password/forgot', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('password/forgot', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('password/reset/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('password/reset', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth')->prefix('auth')->group(function () {
    Route::post('/sign-out', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::middleware('auth')->prefix('account')->group(function () {
    Route::prefix('email')->group(function () {
        Route::get('verify', EmailVerificationPromptController::class)->name('verification.notice');
        Route::get('verify/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
        Route::post('verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    });

    Route::prefix('password')->group(function () {
        Route::get('confirm', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
        Route::post('confirm', [ConfirmablePasswordController::class, 'store']);
    });
});
