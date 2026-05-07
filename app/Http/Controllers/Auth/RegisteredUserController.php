<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // 1. VALIDA: Revisa que los datos del formulario estén bien (que no falten, tamaño correcto y que el correo no esté repetido).
        $attributes = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:255'],
        ]);

        // 2. GUARDA: Crea el nuevo usuario en tu base de datos con esos datos.
        User::create($attributes);

        // 3. REDIRIGE: Manda al usuario a la página de inicio ("/").
        return redirect('/');
    }
}
