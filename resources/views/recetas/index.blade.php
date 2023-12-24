@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Recetas</h1>
        @if ($recetas->count() > 0)
            <div class="row">
                @foreach ($recetas as $receta)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            @if ($receta->imagen)
                                <img src="{{ asset('storage/' . $receta->imagen) }}" class="card-img-top"
                                    alt="Imagen de la receta">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $receta->titulo }}</h5>
                                <p class="card-text">{{ Str::limit($receta->descripcion, 100) }}</p>

                                {{-- Mostrar los primeros pasos de la receta --}}
                                @if ($receta->pasos)
                                    <ul class="list-unstyled">
                                        @foreach ($receta->pasos->take(3) as $paso)
                                            <li>Paso {{ $paso->solicitar }}: {{ Str::limit($paso->pasos, 50) }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <a href="{{ route('recetas.show', $receta->id) }}" class="btn btn-primary-recetas">Ver más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No hay recetas creadas aún.</p>
        @endif
    </div>
@endsection
