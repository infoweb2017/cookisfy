@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center mt-4 text-bg-info">Editar categoria: {{ $categoria->titulo }}</h1>
        <form action="{{ route('admin.categorias.update', $categoria->id) }}" method="POST">
            @csrf <!---Agrega el token CSRF para proteger el formulario--->
            @method('PUT') <!---Utiliza el método HTTP PUT para actualizar--->

            <!---Campo nombre --->
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control"
                    value="{{ $categoria->nombre }}" required>
            </div>
            <!---Campo descripcion --->
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control"
                    value="{{ $categoria->descripcion }}" required>
            </div>
            <!---Campo categoria_tipo --->
            <div class="form-group">
                <label for="categoria_tipo">Tipo de categoria:</label>
                <input type="text" id="categoria_tipo" name="categoria_tipo" class="form-control"
                    value="{{ $categoria->categoria_tipo }}" required>
            </div>
            {{-- Botón de Envío --}}
            <button type="submit" class="btn btn-primary">Actualizar Categoria</button>
        </form>
    </div>
@endsection
