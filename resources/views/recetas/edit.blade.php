{{-- receta.edit --}}
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

            <!-- Campo para la categoría -->
            <div class="form-group">
                <label for="categoria_id">Categoría:</label>
                <select id="categoria_id" name="categoria_id" class="form-control" required>
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ $receta->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- En la vista editar -->
            <div class="form-group" id="ingredientes-dinamicos">
                @foreach ($receta->ingredientes as $index => $ingrediente)
                    <div class="ingrediente">
                        <select name="ingredientes[{{ $index }}][id]" class="form-control">
                            @foreach ($todosIngredientes as $opcionesIngrediente)
                                <option value="{{ $opcionesIngrediente->id }}"
                                    {{ $opcionesIngrediente->id == $ingrediente->id ? 'selected' : '' }}>
                                    {{ $opcionesIngrediente->nombre }}</option>
                            @endforeach
                        </select>
                        <!-- Agrega campos para 'cantidad' y 'unidad' -->
                        <input type="text" name="ingredientes[{{ $index }}][cantidad]" placeholder="Cantidad"
                            value="{{ $ingrediente->pivot->cantidad }}">
                        <input type="text" name="ingredientes[{{ $index }}][unidad]" placeholder="Unidad"
                            value="{{ $ingrediente->pivot->unidad }}">
                    </div>
                @endforeach
            </div>
            <button type="button" id="agregar-ingrediente">Agregar Ingrediente</button>


            <!---Campo para el tiempo de preparación  --->
            <div class="form-group">
                <label for="tiempo_preparacion">Tiempo de Preparación (minutos):</label>
                <input type="number" id="tiempo_preparacion" name="tiempo_preparacion" class="form-control"
                    value="{{ old('tiempo_preparacion', $receta->tiempo_preparacion) }}" required>
            </div>

            <!---Campo para los pasos de la receta--->
            <div class="form-group">
                <label for="pasos">Pasos de Preparación:</label>
                @foreach ($receta->pasos as $paso)
                    <div class="paso">
                        <!-- Utiliza 'solicitar' para el índice del paso -->
                        <textarea name="pasos[{{ $paso->solicitar }}]" class="form-control" placeholder="Paso {{ $paso->solicitar + 1 }}"> {{ old('pasos.' . $paso->solicitar, $paso->pasos) }}</textarea>
                    </div>
                @endforeach
            </div>

            <!-- Campo para la imagen -->
            <!--<div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" class="form-control-file">
            </div>-->

            <!---Botón para enviar el formulario de edición --->
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
        
        <script>
            //Script para la edicion de ingredientes
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('agregar-ingrediente').addEventListener('click', function() {
                    let container = document.getElementById('ingredientes-dinamicos');
                    let newIngredienteIndex = container.getElementsByClassName('ingrediente').length;

                    let ingredienteDiv = document.createElement('div');
                    ingredienteDiv.classList.add('ingrediente');

                    // Crea un select para los ingredientes
                    let select = document.createElement('select');
                    select.name = 'ingredientes[' + newIngredienteIndex + '][id]';
                    select.classList.add('form-control');

                    // Opciones del select (aquí debes incluir tus ingredientes)
                    let ingredientes = @json($todosIngredientes);
                    ingredientes.forEach(function(ingrediente) {
                        var option = document.createElement('option');
                        option.value = ingrediente.id;
                        option.textContent = ingrediente.nombre;
                        select.appendChild(option);
                    });

                    // Campo para la cantidad
                    let cantidadInput = document.createElement('input');
                    cantidadInput.type = 'text';
                    cantidadInput.name = 'ingredientes[' + newIngredienteIndex + '][cantidad]';
                    cantidadInput.placeholder = 'Cantidad';
                    cantidadInput.classList.add('form-control');

                    // Campo para la unidad
                    let unidadInput = document.createElement('input');
                    unidadInput.type = 'text';
                    unidadInput.name = 'ingredientes[' + newIngredienteIndex + '][unidad]';
                    unidadInput.placeholder = 'Unidad';
                    unidadInput.classList.add('form-control');

                    // Añade los elementos al div
                    ingredienteDiv.appendChild(select);
                    ingredienteDiv.appendChild(cantidadInput);
                    ingredienteDiv.appendChild(unidadInput);

                    // Añade el nuevo div de ingrediente al contenedor
                    container.appendChild(ingredienteDiv);
                });
            });
        </script>

    </div>
@endsection
