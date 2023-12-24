@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Resultados de la Búsqueda</h1>
        <div class="row">
            @forelse ($recetas as $receta)
                <div class="col-md-4">
                    <div class="card">
                        @if ($receta->imagen)
                            <img src="{{ asset($receta->imagen) }}" class="card-img-top" alt="Imagen de la receta">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $receta->titulo }}</h5>
                            <p class="card-text">{{ Str::limit($receta->descripcion, 250) }}</p>
                            <a href="{{ route('recetas.show', $receta->id) }}" class="btn btn-primary-recetas">Ver
                                Receta</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No se encontraron recetas.</p>
            @endforelse
        </div>

        <div class="row-cols-lg-1">
            <div class="external-articles mt-4">
                <h3>Explora Más sobre Cocina</h3>
                <ul>
                    @foreach($artExternos as $articulo)
                        <li>
                            <a href="{{ $articulo['url'] }}" target="_blank" rel="noopener noreferrer">{{ $articulo['titulo'] }}</a>
                            <p>{{ $articulo['resumen'] }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
@endsection
