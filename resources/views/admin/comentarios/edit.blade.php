@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center mt-4 text-bg-info">Editar Comentario</h1>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('admin.comentarios.update', $comentario->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="receta_id">Receta</label>
                        <select class="form-control" name="receta_id" id="receta_id">
                            @foreach ($recetas as $receta)
                                <option value="{{ $receta->id }}"
                                    {{ $comentario->receta_id == $receta->id ? 'selected' : '' }}>
                                    {{ $receta->titulo }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user_id">Usuario</label>
                        <select class="form-control" name="user_id" id="user_id">
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}"
                                    {{ $comentario->user_id == $usuario->id ? 'selected' : '' }}>
                                    {{ $usuario->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Contenido del Comentario</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="4">{{ $comentario->descripcion }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
