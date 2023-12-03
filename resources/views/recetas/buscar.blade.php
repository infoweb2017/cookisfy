@extends('layouts.app') 

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Resultados de Búsqueda para "{{ $query }}"</h1>

    @if ($resultados->isEmpty())
        <p>No se encontraron recetas que coincidan con tu búsqueda.</p>
    @else
        <ul>
            @foreach ($resultados as $receta)
                <li><a href="{{ route('recetas.show', $receta->id) }}">{{ $receta->titulo }}</a></li>
            @endforeach
        </ul>
    @endif
</div>
@endsection

<form action="{{ route('recetas.buscar') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" name="query" class="form-control" placeholder="Buscar recetas" aria-label="Buscar recetas" aria-describedby="button-buscar">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="button-buscar">Buscar</button>
        </div>
    </div>
</form>
