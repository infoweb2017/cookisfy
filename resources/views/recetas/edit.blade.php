@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4">Editar: {{ $receta->titulo }}</h1>
        <form action="{{ route('recetas.update', $receta->id) }}" method="POST">
            @csrf <!---Agrega el token CSRF para proteger el formulario--->
            @method('PUT') <!---Utiliza el método HTTP PUT para actualizar--->

            <!---Campo para el título --->
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control"
                    value="{{ old('titulo', $receta->titulo) }}" required>
            </div>

            <!---Campo para la descripcion--->
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control">{{ old('descripcion', $receta->descripcion) }}</textarea>
            </div>

            <!---Campo para el tiempo de preparación  --->
            <div class="form-group">
                <label for="tiempo_preparacion">Tiempo de Preparación (minutos):</label>
                <input type="number" id="tiempo_preparacion" name="tiempo_preparacion" class="form-control"
                    value="{{ old('tiempo_preparacion', $receta->tiempo_preparacion) }}" required>
            </div>

            <!---Botón para enviar el formulario de edición  --->
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
