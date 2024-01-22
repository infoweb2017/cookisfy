{{--receta.receta--}}
@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        <!-- Columna para la imagen -->
        <div class="col-md-6">
            <div class="img-container">
                <img src="{{ asset('storage/' . $receta->imagen) }}" alt="Imagen de la receta" class="img-fluid w-60">
            </div>
        </div>

        <!-- Columna para el texto y los formularios -->
        <div class="col-md-6">
            <h1>{{ $receta->titulo }}</h1>
            <p class="text-justify">{{ $receta->descripcion }}</p>

            {{-- Mostrar los pasos de la receta --}}
            @foreach ($receta->pasos as $paso)
                <p>Paso {{ $paso->solicitar }}: {{ $paso->pasos }}</p>
            @endforeach

            {{-- Sección para comentarios --}}
            <div class="comentarios">
                <h3>Comentarios</h3>
                @foreach ($receta->comentarios as $comentario)
                    <p>{{ $comentario->user->name }}: {{ $comentario->descripcion }}</p>
                @endforeach
                {{-- Formulario para agregar un nuevo comentario --}}
                <form action="{{ route('comentarios.store', $receta->id) }}" method="POST" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <textarea name="descripcion" required class="form-control"></textarea>
                    </div>
                    <input type="hidden" name="receta_id" value="{{ $receta->id }}">
                    <button type="submit" class="btn btn-primary">Agregar Comentario</button>
                </form>
            </div>

            <!-- Botón de compartir y opciones -->
            <button id="btnCompartir" class="btn btn-outline-light mt-2 me-2">
                <i class="fa fa-share-alt"></i> Compartir
            </button>
            {{-- Aquí va el código del botón y opciones de compartir --}}
            <div id="opcionesCompartir" class="compartir-popup" style="display: none;">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}" target="_blank">
                    <i class="fa fa-facebook"></i> Facebook
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}" target="_blank">
                    <i class="fa fa-twitter"></i> Twitter
                </a>
                <a href="https://www.google.com/search?q={{ urlencode(Request::url()) }}" target="_blank">
                    <i class="fa fa-google"></i> Google
                </a>
                <a href="https://www.instagram.com/" target="_blank">
                    <i class="fa fa-instagram"></i> Instagram
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(Request::url()) }}"
                    target="_blank">
                    <i class="fa fa-instagram"></i> Linkedin
                </a>
            </div>
            {{-- Botones de Editar y Eliminar --}}
            <a href="{{ route('recetas.edit', $receta->id) }}" class="btn btn-primary me-2 mt-2">Editar</a>
            <form action="{{ route('recetas.destroy', $receta->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-2"
                    onclick="return confirm('¿Estás seguro de querer eliminar esta receta?')">Eliminar</button>
            </form>
            <div class="">
                {{-- Enlace para regresar a recetas --}}
                <a href="{{ route('recetas.inicio') }}" class="btn btn-secondary mt-5">Volver a Recetas</a>
            </div>
        </div>
        {{-- Aqui irá un carrusel de imagenes de las recetas, para dar mas dinamismo --}}
        <!-- Carrusel de otras recetas -->
        @if ($otrasRecetas->isNotEmpty())
            <div class="col-4 mt-6 img-thumbnail custom-carousel-container">
                <div id="recetasCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($otrasRecetas as $indice => $otraReceta)
                            <div class="carousel-item {{ $indice == 0 ? 'active' : '' }}">
                                <a href="{{ route('recetas.show', $otraReceta->id) }}">
                                    <img src="{{ asset('storage/' . $otraReceta->imagen) }}"
                                        class="d-block w-100 centrar-img" alt="Imagen de la receta">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#recetasCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#recetasCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>
        @endif
    </div>
@endsection
