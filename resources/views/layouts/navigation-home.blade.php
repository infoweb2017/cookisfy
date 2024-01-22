<!--- resources/views/layouts/navigation-home.blade.php -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Cookisfy') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
    <!-- ... Otros encabezados ... -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('images/logo/logo_mini.ico') }}" type="image/x-icon" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/_home.css'])

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="banner">
        <h1>Cookisfy</h1>
        <p>Sé tu propio cocinero.</p>
        <a href="{{ route('saberMas') }}" class="btn-banner">Ver más...</a>
    </div>
    <!-- Barra de navegación -->
    <nav x-data="{ open: false }" class="navbar navbar-expand-lg navbar-collapse bg-danger-subtle">
        <div class="container">
            <!-- Logo o nombre del sitio -->
            <a class="navbar-brand border-r" href="{{route('page_welcome')}}">
                <img class="rounded-circle" src="{{ asset('/images/logo/logo_mini.1.png') }}" alt=""
                    height="46">
            </a><!-- Fin Logo o nombre del sitio -->

            <!-- Botón de alternancia para dispositivos móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('page_welcome')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fotos') }}">Galeria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sobrenosotros') }}">Quienes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
                    </li>
                    <li class="nav-buscar-home">
                        <!-- formulario busqueda de recetas -->
                        <form class="d-flex items-center me-3 my-5 my-lg-0 navbar-form navbar-center"
                            action="{{ route('busquedas.buscar') }}" method="GET"
                            onsubmit="return validarBusqueda()">
                            <input class="form-control me-2" name="query" type="search" placeholder="Buscar"
                                aria-label="Search" id="campoBusqueda">
                            <button class="btn btn-secondary bg-danger-subtle mr-20" type="submit">Buscar</button>
                        </form>
                    </li>
                </ul>
            </div><!-- Fin de navegación -->

            <!-- Botones de autenticación -->
            <div class="d-flex justify-content-between">
                @auth
                    @if (Auth::user()->is_admin)
                        <a href="{{ url('/admin/admin-dashboard') }}" class="btn btn-primary mr-2">Panel de
                            Administrador</a>
                    @else
                        <a href="{{ url('index') }}" class="btn btn-primary mr-2">Inicio</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary mr-2 mb-2">Inicio de sesión</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary ml-3 mb-2">Registro</a>
                    @endif
                @endauth
            </div><!-- Fin Botones de autenticación -->
        </div>
    </nav> <!-- Fin del NavBar-->
    <script>
        function validarBusqueda() {
            let query = document.getElementById('campoBusqueda').value;
            if (query.trim() === '') {
                alert('Por favor, ingresa un término de búsqueda.');
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
