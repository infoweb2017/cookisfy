@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4">Nueva Receta</h1>
        @auth <!-- Verificar si el usuario está autenticado -->
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

                <!---Campo para el tiempo de preparación --->
                <div class="form-group">
                    <label for="tiempo_preparacion">Tiempo de Preparación (minutos):</label>
                    <input type="number" id="tiempo_preparacion" name="tiempo_preparacion" class="form-control"
                        value="{{ old('tiempo_preparacion') }}" required>
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
                <!---Campo para la imagen --->
                <div class="form-group" id="imagen-receta">
                    <label for="imagen">Imagen:</label>
                    <input type="file" id="imagen" name="imagen" class="form-control-file">
                </div>

                <!-- Botón para enviar el formulario -->
                <button type="submit" class="btn btn-primary">Crear Receta</button>
            </form>
        @else
            <!-- Mostrar un mensaje si el usuario no está autenticado -->
            <p>Debes estar registrado para crear recetas. <a href="{{ route('login') }}">Inicia sesión</a> o <a
                    href="{{ route('register') }}">regístrate</a>.</p>
        @endauth
    </div>
@endsection
