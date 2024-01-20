@extends('layouts.admin')

@section('content')
    <div class="container mt-5 border rounded p-4" style="background-color: #ded1d1;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('admin.ofertas.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- Campos para Crear oferta --}}
                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="url">URL:</label>
                        <input type="url" name="url" id="url" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen:</label>
                        <input type="file" name="imagen" id="imagen" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Oferta</button>
                </form>
            </div>
        </div>
    </div>
@endsection
