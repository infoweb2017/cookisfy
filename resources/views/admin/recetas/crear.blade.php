@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center mt-4 text-bg-info">Nueva Receta</h1>
        <form action="{{ route('recetas.store') }}" method="POST" enctype="multipart/form-data">
             <!-- Agrega el token CSRF para proteger el formulario -->
             @csrf

            <!---Campo para el título de la receta --->
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
            </div>
            
             <!---Campo para la descripción  --->
             <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" required>{{ old('descripcion') }}</textarea>
            </div>
            

            <!---Campo para la categoría --->
            <div class="form-group">
                <label for="categoria_id">Categoría:</label>
                <select id="categoria_id" name="categoria_id" class="form-control" required>
                    <option value="">Selecciona una categoría</option>
                    
                    
                </select>
            </div>
           

            <!---Campo para el tiempo de preparación --->
            <div class="form-group">
                <label for="tiempo_preparacion">Tiempo de Preparación (minutos):</label>
                <input type="number" id="tiempo_preparacion" name="tiempo_preparacion" class="form-control"
                    value="{{ old('tiempo_preparacion') }}" required>
            </div>

            <!---Contenedor para los pasos --->
            <div class="form-group" id="pasos-container">
                <label>Pasos de Preparación:</label>
                <div id="paso1" class="paso">
                    <textarea name="pasos[1]" class="form-control" placeholder="Descripción del paso 1"></textarea>
                </div>
            </div>

            <!---Botón para agregar más pasos --->
            <button type="button" id="btn-agregar-paso" class="btn btn-secondary">Añadir otro paso</button>

            <!---Campo para la imagen --->
            <div class="form-group" id="imagen-receta">
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="image" class="form-control-file">
            </div>

            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-primary">Crear Receta</button>
        </form>
    </div>
@endsection
