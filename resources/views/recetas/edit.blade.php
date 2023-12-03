@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Editar Receta</h1>
    <form action="{{ route('recetas.update', $receta->id) }}" method="POST">
        @csrf {{-- Agrega el token CSRF para proteger el formulario --}}
        @method('PUT') {{-- Utiliza el método HTTP PUT para actualizar --}}
        
        {{-- Campo para el título de la receta --}}
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo', $receta->titulo) }}" required>
        </div>
        
        {{-- Campo para los ingredientes --}}
        <div class="form-group">
            <label for="ingredientes">Ingredientes:</label>
            <textarea id="ingredientes" name="ingredientes" class="form-control" required>{{ old('ingredientes', $receta->ingredientes) }}</textarea>
        </div>
        
        {{-- Campo para las instrucciones --}}
        <div class="form-group">
            <label for="instrucciones">Instrucciones:</label>
            <textarea id="instrucciones" name="instrucciones" class="form-control" required>{{ old('instrucciones', $receta->instrucciones) }}</textarea>
        </div>
        
        {{-- Campo para la categoría --}}
        <div class="form-group">
            <label for="categoria_id">Categoría:</label>
            <select id="categoria_id" name="categoria_id" class="form-control" required>
                {{-- Loop para mostrar las categorías disponibles --}}
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @if(old('categoria_id', $receta->categoria_id) == $categoria->id) selected @endif>{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        
        {{-- Campo para el tiempo de preparación --}}
        <div class="form-group">
            <label for="tiempo_preparacion">Tiempo de Preparación (minutos):</label>
            <input type="number" id="tiempo_preparacion" name="tiempo_preparacion" class="form-control" value="{{ old('tiempo_preparacion', $receta->tiempo_preparacion) }}" required>
        </div>
        
        {{-- Botón para enviar el formulario de edición --}}
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
