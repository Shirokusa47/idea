<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = User::create($attributes);

        // 3. LOGUEA: Inicia sesión automáticamente después de registrarse.
        Auth::login($user);

        // 4. REDIRIGE: Manda al usuario a la página de inicio ("/").
        return redirect('/');
    }
}
