@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4">Nueva Ingrediente</h1>
        <form action="{{ route('admin.ingredientes.store') }}" method="POST" enctype="multipart/form-data">
            <!-- Agrega el token CSRF para proteger el formulario -->
            @csrf

            <!---Campo para el nombre --->
            <div class="form-group">
                <label for="nombre">Título:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
            </div>

            <!---Campo para la Cantidad  --->
            <div class="form-group">
                <label for="cantidad_ingredientes">Cantidad ingredientes:</label>
                <input type="number" id="cantidad_ingredientes" name="cantidad_ingredientes" class="form-control"
                    required>{{ old('cantidad_ingredientes') }}
            </div>

            <!---Campo para la opcional  --->
            <div class="form-group">
                <label for="opcional">Opcional:</label>
                <input type="number" id="opcional" name="opcional" class="form-control" required>{{ old('opcional') }}
            </div>
            <!---Campo para la unidad  --->
            <div class="form-group">
                <label for="unidad">Unidad:</label>
                <input type="text" id="unidad" name="unidad" class="form-control" required>{{ old('unidad') }}
            </div>

            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-primary">Crear Ingrediente</button>
        </form>
    </div>
@endsection
