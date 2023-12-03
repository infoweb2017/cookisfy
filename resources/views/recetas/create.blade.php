@extends('layouts.app') 

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Crear Nueva Receta</h1>
    <form action="{{ route('recetas.store') }}" method="POST">
        @csrf {{-- Agrega el token CSRF para proteger el formulario --}}
        
        {{-- Campo para el título de la receta --}}
        
        @csrf {{-- Agrega el token CSRF para proteger el formulario --}}
        
        {{-- Campo para el título de la receta --}}
     
<div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
        </div>
            
        {{-- Campo para los ingredientes --}}
        <div class="form-group">
            <label for="ingredientes">Ingredientes:</label>
            <textarea id="ingredientes" name="ingredientes" class="form-control" required>{{ old('ingredientes') }}</textarea>
        </div>
        
        {{-- Campo para las instrucciones --}}
        <div class="form-group">
            <label for="instrucciones">Instrucciones:</label>
            <textarea id="instrucciones" name="instrucciones" class="form-control" required>{{ old('instrucciones') }}</textarea>
        </div>
        
        {{-- Campo para la categoría --}}
        <div class="form-group">
            <label for="categoria_id">Categoría:</label>
            <select id="categoria_id" name="categoria_id" class="form-control" required>
                <option value="">Selecciona una categoría</option>
                {{-- Loop para mostrar las categorías disponibles --}}
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        
        {{-- Campo para el tiempo de preparación --}}
        <div class="form-group">
            <label for="tiempo_preparacion">Tiempo de Preparación (minutos):</label>
            <input type="number" id="tiempo_preparacion" name="tiempo_preparacion" class="form-control" value="{{ old('tiempo_preparacion') }}" required>
        </div>
        
        {{-- Botón para enviar el formulario --}}
        <button type="submit" class="btn btn-primary">Crear Receta</button>
    </form>
</div>
@endsection