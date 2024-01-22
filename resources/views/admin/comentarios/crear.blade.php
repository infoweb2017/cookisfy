@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center mt-4 text-bg-info">Crear Comentario</h1>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('admin.comentarios.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="receta_id">Receta</label>
                        <select class="form-control" name="receta_id" id="receta_id">
                            <option value="">Selecciona una receta</option>
                            @foreach ($recetas as $receta)
                                <option value="{{ $receta->id }}">{{ $receta->titulo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user_id">Usuario</label>
                        <select class="form-control" name="user_id" id="user_id">
                            <option value="">Selecciona un usuario</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Contenido del Comentario</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Comentario</button>
                </form>
            </div>
        </div>
    </div>
@endsection
