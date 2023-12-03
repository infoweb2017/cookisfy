@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Mostrar la receta y otros detalles -->

    <!-- Mostrar comentarios -->
    <div class="mt-4">
        <h3>Comentarios</h3>
        @if ($receta->comentarios->isEmpty())
        <p>No hay comentarios aún.</p>
        @else
        <ul class="list-unstyled">
            @foreach ($receta->comentarios as $comentario)
            <li class="mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comentario->user->name }}</h5>
                        <p class="card-text">{{ $comentario->comentario }}</p>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        @endif
    </div>

    <!-- Formulario para crear comentarios -->
    @auth
    <div class="mt-4">
        <a href="{{ route('comentarios.crearComentario', $receta->id) }}" class="btn btn-primary">Agregar Comentario</a>
    </div>
    @endauth
</div>
@endsection
