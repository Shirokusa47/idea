<!DOCTYPE html> <!-- Usa la versión más moderna de HTML -->
<html lang="en"> <!-- Idioma en inglés -->
<head> <!-- Configuraciones que el usuario no ve -->
    <meta charset="UTF-8"> <!-- Para que acepte acentos y la 'ñ' -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Adapta la página a celulares -->

    @vite('resources/css/app.css') <!-- Conecta tus estilos (colores, diseño) -->

    <title>Idea</title> <!-- El texto en la pestaña del navegador -->
</head>

<!-- Todo lo que va en <body> es lo que sí se ve en pantalla. -->
<body class="bg-background text-foreground min-h-screen">

<!-- Llamada al componente fijo nav o barra navegacion -->
<x-layout.nav />

<!-- <main> es el contenedor centrado de tu página. -->
<main class="max-w-5xl mx-auto px-4 py-10">

    <!-- EL COMODÍN: Como esta es una plantilla, aquí se va a insertar automáticamente el contenido de tus otras páginas. -->
    {{ $slot }}

</main>

@if (session('success'))
    <div
        class="bg-green-500 text-white px-4 py-2 rounded fixed bottom-3 right-3"
    >
        {{ session('success') }}
    </div>
@endif

</body>
</html>
