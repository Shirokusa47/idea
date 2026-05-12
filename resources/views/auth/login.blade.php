<x-layout.layout>

    <div class="max-w-md mx-auto">
        <!-- Título y mensaje de bienvenida -->
        <h1 class="text-3xl font-bold mb-2">Login</h1>
        <p class="text-zinc-400 mb-8">Glad to have you back.</p>

        <!-- Formulario para iniciar sesión -->
        <form
            method="POST"
            action="/login"
            class="space-y-4">

            @csrf

            <!-- Campo del correo -->
            <x-form.field
                label="Email"
                name="email"
                type="email"
            />

            <!-- Campo de la contraseña (el texto se oculta) -->
            <x-form.field
                label="Password"
                name="password"
                type="password"
            />

            <!-- Botón para enviar los datos y entrar -->
            <button class="button" type="submit">Sign In</button>

        </form>
    </div>

</x-layout.layout>
