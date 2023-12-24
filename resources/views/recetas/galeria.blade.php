@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Galería de Recetas</h1>
        <div class="row">
            @foreach ($recetas as $receta)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $receta->titulo }}</h5>
                            <p class="card-text">{{ Str::limit($receta->descripcion, 300) }}</p>
                            <a href="{{ route('recetas.show', $receta->id) }}" class="btn btn-primary-recetas">Ver Receta</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
