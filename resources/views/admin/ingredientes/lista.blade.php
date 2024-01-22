<!-- resources/views/admin/recetas/lista.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <h2>Listado de Ingredientes</h2>

        <!-- Botón para crear una nueva ingrediente -->
        <a href="{{ route('admin.ingredientes.create') }}" class="btn btn-primary mb-3">Nuevo</a>

        <!-- Tabla  -->
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Unidad</th>
                    <th scope="col">Opcional</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingredientes as $ingrediente)
                    <tr>
                        <th scope="row">{{ $ingrediente->id }}</th>
                        <td>{{ $ingrediente->nombre }}</td>
                        <td>{{ $ingrediente->cantidad_ingredientes }}</td>
                        <td>{{ $ingrediente->unidad }}</td>
                        <td>{{ $ingrediente->opcional }}</td>
                        <td>{{ $ingrediente->categoria_id }}</td>
                        <td>
                            <a href="{{ route('admin.ingredientes.edit', $ingrediente->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('admin.ingredientes.delete', $ingrediente->id) }}" method="POST"
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
            {{ $ingredientes->links('vendor.pagination.simple-bootstrap') }}
        </div>
    </div>
@endsection
