<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Cookisfy') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--- Favicon --->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="path/to/bootstrap.bundle.min.js"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav x-data="{ open: false }"
        class="navbar navbar-expand-lg bg-body-tertiary p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle">
        <div class="container-fluid">
            <!-- Logo  -->
            <a class="navbar-brand border-r" href="{{ route('index') }}">
                <img class="rounded-circle" src="{{ asset('/images/logo/logo_mini.1.png') }}" alt=""
                    height="46">
            </a><!-- Fin Logo -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            id="navbarDropdownMenuLink" aria-expanded="false">
                            Recetas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('recetas.create') }}">Crear mis recetas</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('recetas.inicio') }}">Mis Recetas</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('recetas.galeria') }}">Galería de
                                    Recetas</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sobrenosotros') }}">Quienes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
                    </li>
                    <li class="nav-buscar">
                        <!-- formulario busqueda de recetas -->
                        <form class="d-flex items-center me-3 my-5 my-lg-0 navbar-form navbar-center"
                            action="{{ route('busquedas.buscar') }}" method="GET"
                            onsubmit="return validarBusqueda();">
                            <input class="form-control me-2" name="query" type="search" placeholder="Buscar"
                                aria-label="Search" id="campoBusqueda">
                            <button class="btn btn-secondary bg-danger-subtle mr-20" type="submit">Buscar</button>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- Desplegable de ajustes y  solo si estas autenticado -->
            @auth
                <div class="dropdown">
                    <button class="btn btn-dropdownMenu dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Usuario: {{ auth()->user()->name }}
                        @if (auth()->user()->imagen_perfil)
                            {{-- <img class="img-perfil"
                                src="{{ asset('images/img_usuario/' . auth()->user()->imagen_perfil) }}"
                                alt="Foto de perfil"> --}}
                        @endif
                        @if ($errors->has('imagen_perfil'))
                            <div class="alert alert-danger">
                                {{ $errors->first('imagen_perfil') }}
                            </div>
                        @endif
                    </button>
                    <ul class="dropdown-menu dropMenuBtn" aria-labelledby="dropdownMenuButton">
                        <li class="dropdown-item-menu">
                            <a class="dropdown-item mr-2 mb-2" href="{{ route('perfil.editar') }}">Editar</a>
                        </li>
                        <li class="dropdown-item-menu">
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                <button type="submit">Cerrar sesión</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </nav><!-- fin del nav-->
    <script>
        /**Función formulario de busqueda de recetas */
        function validarBusqueda() {
            let query = document.getElementById('campoBusqueda').value;
            if (query.trim() === '') {
                alert('or favor, ingrese una busqueda adecuada.');
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
