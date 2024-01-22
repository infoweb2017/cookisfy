@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Editar ingrediente</h2>
        <form action="{{ route('admin.ingredientes.update', $ingrediente->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Método HTTP para actualizar --}}

            {{-- Campo para el Nombre --}}
            <div class="form-group">
                <label for="titulo">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $ingrediente->nombre }}"
                    required>
            </div>

            <!---Campo para la Cantidad  --->
            <div class="form-group">
                <label for="cantidad_ingredientes">Cantidad ingredientes:</label>
                <input type="number" id="cantidad_ingredientes" name="cantidad_ingredientes" class="form-control"
                value="{{ $ingrediente->cantidad_ingredientes }}" required>
            </div>

            <!---Campo para la opcional  --->
            <div class="form-group">
                <label for="opcional">Opcional:</label>
                <select id="opcional" name="opcional" class="form-control" required>
                    <option value="1" {{ $ingrediente->opcional == 1 ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ $ingrediente->opcional == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <!---Campo para la unidad  --->
            <div class="form-group">
                <label for="unidad">Unidad:</label>
                <input type="text" id="unidad" name="unidad" class="form-control" required value="{{ $ingrediente->unidad }}">
            </div>

            {{-- Botón de Envío --}}
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
