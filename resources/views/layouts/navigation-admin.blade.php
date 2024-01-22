<!--- resources/views/layouts/navigation-admin.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Cookisfy') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
    <!-- ... Otros encabezados ... -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--- Favicon --->
    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}" type="image/x-icon" />

    @vite(['resources/css/admin.css', 'resources/sass/app.scss', 'resources/js/app.js', 'resources/js/ingredientes.js'])

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @vite(['resources/css/admin.css'])
    <nav x-data="{ open: false }"
        class="navbar navbar-expand-lg bg-secondary text-light p-3 border border-primary-subtle">
        <div class="container-fluid">
            <a class="navbar-brand m-auto" href="{{ route('admin.admin-dashboard') }}">
                <img class="rounded-circle" src="{{ asset('/images/logo/logo_mini.1.png') }}" alt=""
                    height="46">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page"
                            href="{{ route('admin.admin-dashboard') }}">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Gestión Recetas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.recetas') }}">Lista</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.recetas.create') }}">Crear</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul>
                        <li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Gestión Categorias
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.categorias') }}">Lista</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.categorias.create') }}">Crear</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                </ul>
                            </li>
                        </li>
                        <li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Gestión Ingredientes
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.ingredientes') }}">Lista</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.ingredientes.create') }}">Crear</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                </ul>
                            </li>
                        </li>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Gestión Usuarios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.usuarios') }}">Listar</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.usuarios.create') }}">Crear</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Gestión Comentarios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="admin.comentario">Listar</a></li>
                            <li><a class="dropdown-item" href="admin.comentarios.create">Crear</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex items-center my-5 mr-10 my-lg-0 navbar-form navbar-center " id="form-search"
                    method="GET" action="{{ route('admin.resultados') }}">
                    <input type="hidden" name="search_type" value="recetas">
                    <input class="form-control me-1" id="form1" type="search" name="q" placeholder="Buscar "
                        aria-label="Search">
                    <button class="btn bg-danger-subtle" type="submit">Buscar</button>
                </form>
                <!-- Desplegable de ajustes y  solo si estas autenticado -->
                @auth
                    <div class="dropdown m-2">
                        <button class="btn btn-dropdownMenu dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Ajustes
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item mr-2 mb-2" href="{{ route('perfil.editar') }}">Editar Perfil</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
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
        </div>
    </nav> <!-- fin del nav-->
</body>

</html>
