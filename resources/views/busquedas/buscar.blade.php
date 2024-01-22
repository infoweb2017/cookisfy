{{-- Buscar --}}
@extends('layouts.app')

@section('content')
    <div class="container mt-6">
        <h1 class="h1 text-center mb-4">Resultados de la Búsqueda</h1>
        @if (!empty($recetas))
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
                @endforelse
            </div>
        @endif{{-- Fin de receta --}}

        @if (!empty($categorias))
            {{-- Categoria --}}
            <div class="row">
                @forelse ($categorias as $categoria)
                    <div class="col-md-4 mb-4">
                        <div class="card buscar">
                            <div class="card-body">
                                <h5 class="card-title">{{ $categoria->nombre }}</h5>
                                <p class="card-text">{{ Str::limit($categoria->descripcion, 250) }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        @endif{{-- Fin de categoria --}}

        @if (!empty($ingredientes))
            {{-- Ingredientes --}}
            <div class="row">
                @forelse ($ingredientes as $ingrediente)
                    <div class="col-md-4 mb-4">
                        <div class="card buscar">
                            <div class="card-body bg-body-secondary">
                                <h5 class="card-title">{{ $ingrediente->nombre }}</h5>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        @endif{{-- Fin de Ingredientes --}}

        @if (!empty($eventos))
            {{-- Eventos --}}
            <div class="row">
                @forelse ($eventos as $evento)
                    <div class="col-md-4 mb-4">
                        <div class="card buscar">
                            @if ($evento->imagen)
                                <img src="{{ asset($evento->imagen) }}" class="card-img-top" alt="Imagen del evento">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $evento->titulo }}</h5>
                                <p class="card-text">{{ Str::limit($evento->descripcion, 250) }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        @endif{{-- Fin de Eventos --}}

        @if (!empty($ofertas))
        {{-- Ofertas --}}
        <div class="row">
            @forelse ($ofertas as $oferta)
                <div class="col-md-4 mb-4">
                    <div class="card buscar">
                        @if ($oferta->imagen)
                            <img src="{{ asset($oferta->imagen) }}" class="card-img-top" alt="Imagen de la oferta">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $oferta->titulo }}</h5>
                            <p class="card-text">{{ Str::limit($oferta->descripcion, 250) }}</p>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    @endif{{-- Fin de Ofertas --}}

    @if (!empty($articulos))
        {{-- articulo --}}
        <div class="row">
            @forelse ($articulos as $articulo)
                <div class="col-md-4 mb-4">
                    <div class="card buscar">
                        @if ($articulo->imagen)
                            <img src="{{ asset($articulo->imagen) }}" class="card-img-top" alt="Imagen del articulo">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $articulo->titulo }}</h5>
                            <p class="card-text">{{ Str::limit($articulo->descripcion, 250) }}</p>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    @endif{{-- Fin de articulo --}}

        {{-- Mas información --}}
        <div class="row">
            <h3 class="display-6 text-bg-light mt-5">Explora Más sobre Cocina</h3>
            @foreach ($artExternos as $articulo)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $articulo['titulo'] }}</h5>
                            <img src="{{ asset($articulo['imagen']) }}" class="card-img-top" alt="Imagen del artículo">
                            <p class="card-text">{{ $articulo['resumen'] }}</p>
                            <a href="{{ $articulo['url'] }}" target="_blank" rel="noopener noreferrer"
                                class="btn btn-primary">Leer Más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
