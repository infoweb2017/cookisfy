@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-center mt-4 text-bg-info">Editar Receta: {{ $receta->titulo }}</h1>
    <form action="{{ route('admin.recetas.update', $receta->id) }}" method="POST">
        @csrf <!---Agrega el token CSRF para proteger el formulario--->
        @method('PUT') <!---Utiliza el método HTTP PUT para actualizar--->

        <!---Campo para el título de la receta--->
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" class="form-control"
                value="{{ old('titulo', $receta->titulo) }}" required>
        </div>

        <!---Campo para las instrucciones --->
        <div class="form-group">
            <label for="instrucciones">Instrucciones:</label>
            <textarea id="instrucciones" name="instrucciones" class="form-control" required>{{ old('instrucciones', $receta->instrucciones) }}</textarea>
        </div>

        <!---Campo para la categoría --->
        <div class="form-group">
            <label for="categoria_id">Categoría:</label>
            <select id="categoria_id" name="categoria_id" class="form-control" required>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $receta->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!---Campo para los pasos --->
        
        
        <!---Botón para añadir más pasos --->
        <button type="button"  id="btn-agregar-paso" class="btn btn-secondary">Añadir otro paso</button>

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
