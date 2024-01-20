<!-- resources/views/admin/recetas/lista.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <h2>Listado de Categoria</h2>

        <!-- Botón para crear una nueva receta -->
        <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary mb-3">Nueva Categoria</a>

        <!-- Tabla de recetas -->
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Título</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <th scope="row">{{ $categoria->id }}</th>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                            <a href="{{ route('admin.categorias.edit', $categoria->id) }}"
                                class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('admin.categorias.delete', $categoria->id) }}" method="POST"
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
        <div class="pagination">
            {{ $categorias->links('vendor.pagination.simple-bootstrap') }}
        </div>
    </div>
@endsection
