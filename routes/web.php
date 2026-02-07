<?php

declare(strict_types=1);

use App\Http\Controllers\Box\CreateBoxController;
use App\Http\Controllers\Box\ListBoxController;
use App\Http\Controllers\Box\ShowBoxController;
use App\Http\Controllers\Box\StoreBoxController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

Route::prefix('boxes')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', ListBoxController::class)->name('boxes.index');
    Route::get('/new', CreateBoxController::class)->name('boxes.create');
    Route::post('/', StoreBoxController::class)->name('boxes.store');
    Route::get('/{box:slug}', ShowBoxController::class)->name('boxes.show');
});

require __DIR__.'/auth.php';
require __DIR__.'/settings.php';
