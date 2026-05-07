<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // 1. VALIDA: Exige que el usuario haya escrito un correo y una contraseña.
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. INTENTA ENTRAR: Verifica en la base de datos si las credenciales coinciden.
        if (! Auth::attempt($attributes)) {
            // Si fallan, lo regresa a la página de login con un error y le deja puesto el correo que intentó.
            return back()
                ->withErrors(['email' => 'Invalid credentials.'])
                ->onlyInput('email');
        }

        // 3. SEGURIDAD: Renueva la sesión (una medida extra para evitar hackeos tras hacer login).
        $request->session()->regenerate();

        // 4. REDIRIGE: Lo manda a la página principal.
        return redirect('/');
    }

    public function destroy()
    {
        // 1. CIERRA SESIÓN: Desconecta al usuario actual.
        Auth::logout();

        // 2. REDIRIGE: Lo manda de vuelta a la página de inicio ("/").
        return redirect('/');
    }
}
