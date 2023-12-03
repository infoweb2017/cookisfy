@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Resultados de Búsqueda Avanzada</h1>

    @if ($resultados->isEmpty())
        <p>No se encontraron recetas que coincidan con los criterios de búsqueda.</p>
    @else
        <ul class="list-group">
            @foreach ($resultados as $receta)
                <li class="list-group-item">
                    <h3>{{ $receta->titulo }}</h3>
                    <p>Categoría: {{ $receta->categoria->nombre }}</p>
                    <p>Ingredientes: {{ $receta->ingredientes }}</p>
                    <p>Tiempo de Preparación: {{ $receta->tiempo_preparacion }} minutos</p>
                    <p>Nivel de Dificultad: {{ $receta->nivel_dificultad }}</p>
                    {{-- Agregar más detalles de la receta si es necesario --}}
                    <a href="{{ route('recetas.show', $receta->id) }}" class="btn btn-primary">Ver Receta</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
