@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4">Nueva Receta</h1>
        <form action="{{ route('recetas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Agrega el token CSRF para proteger el formulario -->

            <!---Campo para el título de la receta --->
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
            </div>
            <!---Campo para los ingredientes --->
            <div class="form-group">
                <label for="buscarIngrediente">Buscar Ingrediente:</label>
                <input type="text" id="buscarIngrediente" class="form-control buscador-ingredientes"
                    placeholder="Escribe para buscar...">

                <button type="button" id="btnMostrarIngredientes" class="btn btn-secondary mt-2">Ingredientes</button>
                <div id="selectorIngredientes" style="display: none;">
                    @foreach ($ingredientes as $ingrediente)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="ingrediente-checkbox"
                                    name="ingredientes[{{ $ingrediente->id }}][id]" value="{{ $ingrediente->id }}">
                                <input type="text" name="ingredientes[{{ $ingrediente->id }}][cantidad]">
                                <input type="text" name="ingredientes[{{ $ingrediente->id }}][unidad]">
                                {{ $ingrediente->nombre }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <button type="button" id="btnMostrarSeleccionados" class="btn btn-secondary mt-2">Mostrar
                    Seleccionados</button>

                <button type="button" id="btnMostrarFormularioIngrediente" class="btn btn-secondary mt-2">Añadir
                    Ingrediente</button>
                <div id="formularioAgregarIngrediente" style="display: none;">
                    <div class="form-group">
                        <input type="text" id="nombreNuevoIngrediente" class="form-control"
                            placeholder="Nombre del ingrediente">
                    </div>
                    <button type="button" id="btnGuardarNuevoIngrediente" class="btn btn-primary">Guardar
                        Ingrediente</button>
                </div>

                <div id="ingredientesMostrados" class="mt-2" style="display: none;"></div>
            </div>
            <!---Campo para la categoría --->
            <div class="form-group">
                <label for="categoria_id">Categoría:</label>
                <select id="categoria_id" name="categoria_id" class="form-control" required>
                    <option value="">Selecciona una categoría</option>
                    {{-- Loop para mostrar las categorías disponibles --}}
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <!---Campo para la descripción  --->
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" required>{{ old('descripcion') }}</textarea>
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
