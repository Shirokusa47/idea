<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/ideas');

// Register
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// Login
Route::get('/login', [SessionsController::class, 'create'])
    ->name('login');

Route::post('/login', [SessionsController::class, 'store']);

// Logout
Route::post('/logout', [SessionsController::class, 'destroy']);

// Ideas
Route::get('/ideas', [IdeaController::class, 'index'])
    ->middleware('auth')
    ->name('idea.index');

Route::get('/ideas/{idea}', [IdeaController::class, 'show'])
    ->middleware('auth')
    ->name('idea.show');
