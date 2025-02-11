<?php

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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
