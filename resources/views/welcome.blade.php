<!-- welcome.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Slider -->
    <div id="receta-slider" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#receta-slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Receta 1">
            </li>
            <li data-bs-target="#receta-slider" data-bs-slide-to="1" aria-label="Receta 2"></li>
            <li data-bs-target="#receta-slider" data-bs-slide-to="2" aria-label="Receta 3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active d-item">
                <img src="{{ asset('images/imagenes/webvilla-hv1MrBzGGNY-unsplash.jpg') }}" class="d-block w-100 img-fluid"
                    alt="Receta 1" />
            </div>
            <div class="carousel-item d-item">
                <img src="{{ asset('images/imagenes/bread.jpg') }}" class="d-block w-100 img-fluid" alt="Receta 2" />
            </div>
            <div class="carousel-item d-item">
                <img src="{{ asset('images/imagenes/oil-3112195_640.jpg') }}" class="d-block w-100 img-fluid"
                    alt="Receta 3" />
            </div>
        </div>
        <a class="carousel-control-prev" href="#receta-slider" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#receta-slider" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </a>
    </div>
    <!-- Fin   Slider -->

    <main>
        <div class="container mt-5">
            <h1 class="display-4">Bienvenido a Cookisfy</h1>

            <!-- Sección de recetas con descripción -->
            <div class="row">
                @foreach ($recetas->take(6) as $receta)
                    {{-- Con take(6) lmito las recetas --}}
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('' . $receta->imagen) }}" alt="{{ $receta->titulo }}" class="card-img-top"
                                data-bs-toggle="modal" data-bs-target="#recetaModal{{ $receta->id }}">
                            <div class="card-body">
                                <h3 class="card-title">{{ $receta->titulo }}</h3>
                                <p class="card-text descripcion-corta">{{ $receta->descripcion }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Modal para mostrar más información de la receta -->
                    <div class="modal fade" id="recetaModal{{ $receta->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="recetaModalLabel{{ $receta->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="recetaModalLabel{{ $receta->id }}">
                                        {{ $receta->titulo }}</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('' . $receta->imagen) }}" alt="{{ $receta->titulo }}"
                                        class="img-fluid mb-2">
                                    <p>
                                    <blockquote><b>Descripción:</b></blockquote> {{ $receta->descripcion }}</p>
                                    <p>
                                    <blockquote><b>Ingredientes:</b></blockquote>
                                    </p>
                                    <ul>
                                        @foreach (json_decode($receta->ingredientes) as $ingrediente)
                                            <li>
                                                {{ $ingrediente->nombre }} - {{ $ingrediente->pivot->cantidad }}
                                                {{ $ingrediente->pivot->unidad }}
                                            </li>
                                        @endforeach
                                    </ul>
                                    <p>
                                    <blockquote><b>Tiempo preparación:</b></blockquote>{{ $receta->tiempo_preparacion }}
                                    </p>
                                    @if ($receta->comentarios->count() > 0)
                                        <div class="comentarios-anteriores">
                                            <h4>Comentarios</h4>
                                            <!-- Mostrar los comentarios públicos -->
                                            @foreach ($comentario as $coment)
                                                <div class="comentario">
                                                    <p>{{ $coment->descripcion }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p>No hay comentarios aún.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- Fin Sección de recetas con descripción -->

            <!-- Sección de Artículos -->
            <div class="row border-gray-400">
                <h2 class="display-6 text-center mb-3">Artículos de comida saludable</h2>
                <p class="parrafo-art">Una alimentación sana y equilibrada es esencial para mantener un estilo de vida
                    saludable.
                    Aquí te ofrecemos algunos consejos clave para ayudarte a tomar decisiones alimenticias más saludables.
                    En primer lugar, es importante incluir una variedad de alimentos en tu dieta, como frutas, verduras,
                    granos enteros, proteínas magras y productos lácteos bajos en grasa. Evita el exceso de azúcar, sal y
                    grasas saturadas, que pueden aumentar el riesgo de enfermedades crónicas. Además, presta atención al
                    tamaño de las porciones y come conscientemente, saboreando cada bocado. No te saltes comidas y mantén un
                    horario regular de comidas para mantener niveles de energía estables. Finalmente, no olvides mantenerse
                    hidratado bebiendo suficiente agua durante el día. Al seguir estos consejos, estarás en camino de
                    disfrutar de una vida más saludable y llena de vitalidad.</p>
                @foreach ($articulos as $articulo)
                    <div class="col-md-3">
                        <div class="card" style="width: 20rem;">
                            <div class="card-body">
                                <img src="{{ asset('storage/' . $articulo->imagen) }}">
                                <h5 class="card-title">{{ $articulo->titulo }}</h5>
                                <p class="card-text">{{ $articulo->descripcion }}</p>
                                <a href="{{ $articulo->url }}" class="btn btn-card-enlaces center-block"
                                    target="_blank">Ver</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Fin Sección de Artículos -->
        </div><!--- Fin de card --->

        <!-- Sección de Vídeo de Cocina -->
        {{-- <div class="video-container">
            <div class="embed-responsive embed-responsive-16by9 video-background">
                <iframe class="embed-responsive-item"
                    src="https://www.youtube.com/embed/1LB6h4s9Bx0?rel=0&modestbranding=1" allowfullscreen></iframe>
            </div>
        </div> --}}<!-- Fin Sección de Vídeo de Cocina -->

        <!-- Suscripción a Newsletter -->
        <section class="mt-4" style="background-color: #e8e1d3;"> <!-- Color pastel de fondo -->

            <div class="container-fluid"> <!-- Contenedor de ancho completo -->
                <!--- Detectar posibles errores --->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row justify-content-center"> <!-- Centrar contenido -->
                    <div class="col-md-4"> <!-- Ajustar ancho de la columna -->
                        <div class="card" style="background-color: #f9d99a;">
                            <div class="card-body text-center"> <!-- Centrar texto -->
                                <div class="newsletter-subscribe">
                                    <h2>Suscríbete a Nuestro Boletín</h2>
                                    <form action="{{ route('subscribe') }}" method="POST"
                                        class="form-inline justify-content-center"> <!-- Centrar formulario -->
                                        @csrf
                                        <div class="form-group mb-2">
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Ingresa tu email" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-4">Suscríbete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- Fin Suscripción a Newsletter -->

    </main>
    <script>
        $(document).ready(function() {
            // Inicializar los modales de Bootstrap
            $('[data-toggle="modal"]').modal();
        });
    </script>
@endsection




@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@stop
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@stop
