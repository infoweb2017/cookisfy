@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <h2>Resultados de la búsqueda</h2>
        @if (!empty($recetas))
            <div class="row">
                @foreach ($recetas as $receta)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($receta->imagen)
                                <img src="{{ asset($receta->imagen) }}" class="card-img-top" alt="Imagen de la receta">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $receta->titulo }}</h5>
                                <p class="card-text">{{ Str::limit($receta->descripcion, 150) }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p><b>Ingredientes:</b> </p>{{ $receta->ingredientes }}
                                </li>
                                <li class="list-group-item">
                                    <p><b>Categoría:</b> </p> {{ $receta->categoria }}
                                </li>
                                @if (!empty($receta->pasos === ''))
                                    <li class="list-group-item">Pasos: {{ $receta->pasos }}</li>
                                @else
                                    <b>Esta receta no contiene pasos de preparación.</b>
                                @endif
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        @if (!empty($usuarios))
            <ul class="list-group">
                @foreach ($usuarios as $usuario)
                    <li class="list-group-item">
                        <h5>Usuario: {{ $usuario->name }}</h5>
                        <p>Correo: {{ $usuario->email }}</p>
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="bt-edit btn btn-primary">Editar</a>
                            
                            <form action="{{ route('admin.usuarios.delete', $usuario->id) }}" method="POST" style="display:inline;>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
        @if (empty($recetas) && empty($usuarios))
            <p>No se encontraron resultados para la búsqueda.</p>
        @endif
    </div>
@endsection
