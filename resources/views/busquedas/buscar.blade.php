@extends('layouts.app')

@section('content')
    <div class="container mt-6">
        <h1 class="h1 text-center mb-4">Resultados de la Búsqueda</h1>
        <div class="row">
            @forelse ($recetas as $receta)
                <div class="col-md-4 mb-4">
                    <div class="card buscar">
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

        
    <div class="row">
        <h3 class="display-6 text-bg-light mt-5">Explora Más sobre Cocina</h3>
        @foreach($artExternos as $articulo)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <!-- Si tienes imágenes para los artículos, puedes incluirlas aquí -->
                    <div class="card-body">
                        <h5 class="card-title">{{ $articulo['titulo'] }}</h5>
                        <img src="{{ asset($articulo['imagen']) }}" class="card-img-top" alt="Imagen del artículo">
                        <p class="card-text">{{ $articulo['resumen'] }}</p>
                        <a href="{{ $articulo['url'] }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Leer Más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
