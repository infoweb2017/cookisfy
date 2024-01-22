<!-- resources/views/admin/comentarios/lista.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <h2 class="text-center mt-4 text-bg-info">Listado de Comentarios por Usuarios y Recetas</h2>
        <!-- Botón para crear una nueva receta -->
        <a href="{{ route('admin.comentarios.create') }}" class="btn btn-primary mb-3">Nuevo</a>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Usuario</th>
                    <th>Receta</th>
                    <th>Comentario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comentarios as $comentario)
                    <tr>
                        <th scope="row">{{ $comentario->id }}</th>
                        <td>{{ $comentario->user->name }}</td>
                        <td>{{ $comentario->receta->titulo }}</td>
                        <td>{{ $comentario->descripcion }}</td>
                        <td>
                            <a href="{{ route('admin.comentarios.edit', $comentario->id) }}"
                                class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('admin.comentarios.destroy', $comentario->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
