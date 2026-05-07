<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionsController;

Route::get('/', fn() => view('welcome'));

// Entrar a la ruta "/register" carga la pantalla de Registro.
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// Entrar a la ruta "/login" carga la pantalla de Iniciar Sesión.
Route::get('/login', [SessionsController::class, 'create']);
Route::post('/login', [SessionsController::class, 'store']);


Route::post('/logout', [SessionsController::class, 'destroy']);
