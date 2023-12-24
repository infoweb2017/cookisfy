@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 mb-4">
            <h1>{{ $receta->titulo }}</h1>
            <p>{{ $receta->descripcion }}</p>
            <img src="{{ asset('storage/' . $receta->imagen) }}" alt="Imagen de la receta">

            {{-- Mostrar los pasos de la receta --}}
            @foreach ($receta->pasos as $paso)
                <p>Paso {{ $paso->solicitar }}: {{ $paso->pasos }}</p>
            @endforeach

            {{-- Agregar un formulario para nuevos comentarios y mostrar comentarios existentes --}}
            {{-- Sección para comentarios --}}
            <div class="comentarios">
                <h3>Comentarios</h3>

                @foreach ($receta->comentarios as $comentario)
                    <p>{{ $comentario->contenidos }}</p> {{-- Asume que cada comentario tiene un campo 'contenidos' --}}
                @endforeach

                {{-- Formulario para agregar un nuevo comentario --}}
                <form action="{{ route('comentarios.store', $receta->id) }}" method="POST">
                    @csrf
                    <textarea name="contenido" required></textarea>
                    <button type="submit">Agregar Comentario</button>
                </form>
            </div>

            {{-- Sección para reseñas --}}

            {{-- Muestra las reseñas de la receta aquí --}}

            <!-- Botón de compartir -->
            <button id="btnCompartir" class="btn btn-outline-light">
                <i class="fa fa-share-alt"></i> Compartir
            </button>
            <!-- Ventana emergente para opciones de compartir -->
            <div id="opcionesCompartir" class="compartir-popup" style="display: none;">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}" target="_blank">
                    <i class="fa fa-facebook"></i> Facebook
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}" target="_blank">
                    <i class="fa fa-twitter"></i> Twitter
                </a>
                <!-- Agrega más opciones de redes sociales aquí -->
            </div>

            {{-- Botón de Editar --}}
            <a href="{{ route('recetas.edit', $receta->id) }}" class="btn btn-primary">Editar</a>

            {{-- Botón de Eliminar --}}
            <form action="{{ route('recetas.destroy', $receta->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('¿Estás seguro de querer eliminar esta receta?')">Eliminar</button>
            </form>
        </div>

        {{-- Enlaces para regresar o realizar otras acciones --}}
        <a href="{{ route('recetas.index') }}" class="btn btn-secondary">Volver a Recetas</a>
    </div>
@endsection
