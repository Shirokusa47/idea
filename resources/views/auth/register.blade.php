<!-- LO MÁS IMPORTANTE: Esto llama a tu plantilla maestra (el primer código que me mandaste). -->
<x-layout.layout>

    <div class="max-w-md mx-auto">
        <!-- Título y subtítulo de la página -->
        <h1 class="text-3xl font-bold mb-2">Register Account</h1>
        <p class="text-zinc-400 mb-8">Inicia tracking your ideas today.</p>

        <!-- <form> agrupa los datos que el usuario va a rellenar y enviar -->
        <form
            method="POST"
            action="/register"
            class="space-y-4">

            @csrf

            <!-- Campo para el Nombre -->
            <x-form.field
                label="Name"
                name="name"
            />

            <!-- Campo para el Correo -->
            <x-form.field
                label="Email"
                name="email"
                type="email"
            />

            <!-- Campo para la Contraseña -->
            <x-form.field
                label="Password"
                name="password"
                type="password"
            />

            <!-- Botón para enviar todo lo del <form> -->
            <button class="button">Create Account</button>

        </form>
    </div>

</x-layout.layout>
