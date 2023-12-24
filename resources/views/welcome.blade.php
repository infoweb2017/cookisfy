<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--- Favicon --->
    <link rel="icon" href="{{ asset('build/assets/logo/logo_mini.ico') }}" type="image/x-icon" />

    <!--- Estilos bootstrap --->
    <link href="{{ asset('css/.css') }}" rel="stylesheet">

    <!-- En mi archivo Blade css personalizado -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!--- Librerias js --->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
    <title>{{ config('app.name', 'Cookisfy') }}</title>
</head>

<body>
    @include('layouts.navigation-home')

    <!-- Slider -->
    <div id="receta-slider" class="carousel slide" data-ride="carousel" h>
        <ol class="carousel-indicators">
            <li data-bs-target="#receta-slider" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Receta 1"></li>
            <li data-bs-target="#receta-slider" data-bs-slide-to="1" aria-label="Receta 2"></li>
            <li data-bs-target="#receta-slider" data-bs-slide-to="2" aria-label="Receta 3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active d-item">
                <img src="{{ asset('build/assets/image/webvilla-hv1MrBzGGNY-unsplash.jpg') }}"
                    class="d-block w-100 img-fluid" alt="Receta 1" />
                <div class="carousel-caption">
                    <h5>Nombre de la Receta 1</h5>
                    <p>Descripción de la Receta 1</p>
                </div>
            </div>
            <div class="carousel-item d-item">
                <img src="{{ asset('build/assets/image/noodles.jpg') }}" class="d-block w-100 img-fluid"
                    alt="Receta 2" />
                <div class="carousel-caption">
                    <h5>Nombre de la Receta 2</h5>
                    <p>Descripción de la Receta 2</p>
                </div>
            </div>
            <div class="carousel-item d-item">
                <img src="{{ asset('build/assets/image/alex-munsell-Yr4n8O_3UPc-unsplash.jpg') }}"
                    class="d-block w-100 img-fluid" alt="Receta 3" />
                <div class="carousel-caption">
                    <h5>Nombre de la Receta 3</h5>
                    <p>Descripción de la Receta 3</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#receta-slider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#receta-slider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </a>
    </div>
    <!-- Fin   Slider -->

    <main>
        <div class="container mt-5">
            <h1>Bienvenido a Mi App de Recetas</h1>

            <!-- Sección de recetas con descripción y reseñas -->
            <div class="row mt-4">
                <!-- Aquí puedes iterar sobre tus recetas y mostrarlas -->
                @if (isset($recetas))
                    @foreach ($recetas as $receta)
                        <div class="col-sm-6 mb-4">
                            <img src="{{ $receta->imagen }}" alt="{{ $receta->titulo }}" class="img-fluid">
                            <h3>{{ $receta->titulo }}</h3>
                            <p>{{ $receta->descripcion }}</p>

                            <!-- Agregar sección de comentarios oculta -->
                            <div class="comentarios" style="display: none;">
                                <h4>Comentarios</h4>
                                <p>{{ $receta->comentario }}</p>
                                <!-- Puedes agregar más contenido aquí si es necesario -->
                            </div>

                            <!-- Enlace para mostrar/ocultar comentarios -->
                            <a href="#" class="mostrar-comentarios" data-target=".comentarios">Mostrar
                                Comentarios</a>
                        </div>
                    @endforeach
                @else
                    <p>No hay recetas disponibles.</p>
                @endif
            </div>
            <!-- Sección de Consejos o Artículos -->
            <div class="row mt-5">
                <div class="col-md-12">
                    <h2>Consejos y Artículos de Cocina</h2>
                    <ul>
                        <li><a href="URL_DEL_ARTICULO_1">Título del Artículo 1</a></li>
                        <li><a href="URL_DEL_ARTICULO_2">Título del Artículo 2</a></li>
                        <!-- Más artículos aquí -->
                    </ul>
                </div>
            </div>

            <!-- Sección para insertar un vídeo -->
            <!-- Sección de Vídeo de Cocina -->
            <div class="row mt-5">
                <div class="col-md-12">
                    <h2>Vídeo de Cocina</h2>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/TU_VIDEO_ID"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footer')

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<!-- Agregar scripts para ocular comentarios -->
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Manejar clic en el enlace para mostrar/ocultar comentarios
            $('.mostrar-comentarios').on('click', function(e) {
                e.preventDefault();
                var target = $(this).data('target');
                $(target).toggle();
            });
        });
    </script>
@endpush
