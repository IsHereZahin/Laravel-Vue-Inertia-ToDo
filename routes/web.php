<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {

    // Group for the Dashboard
    Route::prefix('dashboard')->controller(DashboardController::class)->group(function () {
        Route::get('/', 'dashboard')->name('dashboard');
    });

    // Group for ProfileController
    Route::prefix('profile')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'edit')->name('profile.edit');
        Route::patch('/', 'update')->name('profile.update');
        Route::delete('/', 'destroy')->name('profile.destroy');
    });

    // Group for TodoController
    Route::prefix('todos')->controller(TodoController::class)->group(function () {
        Route::get('/', 'index')->name('todo.index');
        Route::get('/create', 'create')->name('todo.create');
        Route::post('/', 'store')->name('todo.store');
        Route::get('/{todo}', 'show')->name('todo.show');
        Route::get('/{todo}/edit', 'edit')->name('todo.edit');
        Route::put('/{todo}', 'update')->name('todo.update');
        Route::delete('/{todo}', 'destroy')->name('todo.destroy');
        Route::patch('/{todo}/complete', 'complete')->name('todo.complete');
        Route::patch('/{todo}/uncomplete', 'uncomplete')->name('todo.uncomplete');
    });
});

require __DIR__.'/auth.php';
