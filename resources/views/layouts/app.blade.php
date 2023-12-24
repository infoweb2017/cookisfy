<!--- resources/views/layouts/app.blade.php -->

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Cookisfy') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
        integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--- Favicon --->
    <link rel="icon" href="{{ asset('build/assets/logo/logo_mini.ico') }}" type="image/x-icon" />

    <!-- Scripts -->
    @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js', 'resources/js/ingredientes.js'])

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
    <!-- ... Contenido del cuerpo ... -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body style="font-family: 'Roboto', sans-serif;">
    <!-- Condición para elegir la barra de navegación -->
    @auth
        @include('layouts.navigation-user') <!-- Usuario autenticado -->
    @else
        @include('layouts.navigation-home') <!--Visitante -->
    @endauth
    <div id="app bg-primary-subtle">
        <main class="container-fluid">
            @yield('content')<!-- Sección específica de contenido de cada vista -->
        </main>
        @include('layouts.footer')
    </div>

    @vite(['resources/js/ingredientes.js'])

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Obtén el enlace de inicio por su ID
            let inicioLink = document.getElementById("nav-link");

            // Verifica si estás en la página de inicio
            if (window.location.pathname === "") {
                // Si estás en la página de inicio, simplemente recarga la página cuando se hace clic en el enlace
                inicioLink.addEventListener("click", function(e) {
                    e.preventDefault();
                    location.reload();
                });
            }
        });
    </script>
</body>

</html>
