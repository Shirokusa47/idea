<!-- <nav> crea una barra de navegación (el menú principal). Le pone una línea en el borde inferior. -->
<nav class="border-b border-border">

    <!-- <div> es un contenedor. Aquí centra el contenido y separa el logo a la izquierda y los botones a la derecha. -->
    <div class="max-w-5xl mx-auto h-14 px-4 flex items-center justify-between">

        <!-- <a> es un enlace. Este funciona como tu Logo ("Idea") y al hacer clic te lleva a la página de inicio ("/"). -->
        <a href="/" class="font-bold text-primary">
            Idea
        </a>

        <!-- Otro <div> para agrupar y separar un poco los botones de registro y login. -->
        <div class="flex items-center gap-5">

            <!-- guest: Esto SOLO se muestra si el usuario NO ha iniciado sesión (es invitado). -->
            @guest
                <a href="/register">Register</a>
                <a href="/login" class="button">Login</a>
            @endguest

            <!-- auth: Esto SOLO se muestra si el usuario SÍ ha iniciado sesión. -->
            @auth
                <!-- Formulario para mandar la petición de cerrar sesión -->
                <form method="POST" action="/logout">

                    <!-- csrf: Código de seguridad súper importante y obligatorio en Laravel para proteger tus formularios. -->
                    @csrf

                    <button class="button">Logout</button>
                </form>
            @endauth

        </div>

    </div>
</nav>
