<!--- resources/views/layouts/app.blade.php -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Cookisfy') }}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
        integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--- Favicon --->
    <link rel="icon" href="{{ asset('images/logo/logo_mini.ico') }}" type="image/x-icon" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js', 'resources/js/ingredientes.js', 'resources/css/welcome.css'])
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
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
            @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js', 'resources/js/ingredientes.js'])
            @yield('content')<!-- Sección específica de contenido de cada vista -->
        </main>
    </div>
    @include('layouts.footer')
    <!--- Cookies --->
    @if (!session()->has('cookies_aceptadas'))
        <div id="cookieContainer">
            <p>Este sitio usa cookies para mejorar la experiencia del usuario.
                <a href="{{ route('cookies') }} target='_blank'">Leer más...</a>.
            </p>
            <button id="aceptarCookies">Aceptar Cookies</button>
            <button id="cancelarCookies">Cancelar</button>
        </div>
    @endif

    @vite(['resources/js/ingredientes.js', 'resources/js/aceptar-cookies.js'])

    <!-- Incluir el archivo JS externo para la lógica de aceptación de cookies -->
    <script src="{{ asset('js/aceptar-cookies.js') }}"></script>
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
