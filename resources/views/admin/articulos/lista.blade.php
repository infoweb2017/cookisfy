<!-- resources/views/admin/recetas/lista.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <h2 class="text-center mt-4 text-bg-info">Listado de articulo</h2>

        <!-- Botón para crear una nueva receta -->
        <a href="{{ route('admin.articulos.create') }}" class="btn btn-primary mb-3">Nuevo Articulo</a>

        <!-- Tabla de recetas -->
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articulos as $articulo)
                    <tr>
                        <th scope="row">{{ $articulo->id }}</th>
                        <td>{{ $articulo->titulo }}</td>
                        <td>
                            <a href="{{ route('admin.articulos.edit', $articulo->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('admin.articulos.delete', $articulo->id) }}" method="POST"
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
