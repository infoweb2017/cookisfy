@extends('layouts.admin')
@section('content')
    <div class="container mt-5 border rounded p-4" style="background-color: #ded1d1;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('admin.categorias.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- Campos para Crear Categoría --}}
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categoria_tipo">Tipo de Categoría:</label>
                        <input type="text" name="categoria_tipo" id="categoria_tipo" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Categoría</button>
                </form>
            </div>
        </div>
    </div>
@endsection
