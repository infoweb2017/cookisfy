@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mt-4 text-bg-info">Editar evento</h2>
        <form action="{{ route('admin.eventos.update', $evento->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Método HTTP para actualizar --}}

            {{-- Campo para el Título --}}
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $evento->titulo }}"
                    required>
            </div>

            {{-- Campo para la Descripción --}}
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required>{{ $evento->descripcion }}</textarea>
            </div>

            {{-- Campo para la URL --}}
            <div class="form-group">
                <label for="url">URL:</label>
                <input type="url" name="url" id="url" class="form-control" value="{{ $evento->url }}"
                    required>
            </div>

            {{-- Campo para la Imagen --}}
            <div class="form-group">
                <label for="imagen">Imagen Actual:</label>
                <br>
                @if ($evento->imagen)
                    <img src="{{ asset('storage/' . $evento->imagen) }}" width="100px" height="100px">
                @else
                    No hay imagen cargada.
                @endif
                <br><br>
                <label for="imagen">Cambiar Imagen:</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
            </div>

            {{-- Botón de Envío --}}
            <button type="submit" class="btn btn-primary">Actualizar evento</button>
        </form>
    </div>
@endsection
