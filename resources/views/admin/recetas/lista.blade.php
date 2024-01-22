<!-- resources/views/admin/recetas/lista.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <h2 class="text-center mt-4 text-bg-info">Listado de Recetas</h2>

        <!-- Botón para crear una nueva receta -->
        <a href="{{ route('admin.recetas.create') }}" class="btn btn-primary mb-3">Nueva Receta</a>

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
                @foreach ($recetas as $receta)
                    <tr>
                        <th scope="row">{{ $receta->id }}</th>
                        <td>{{ $receta->titulo }}</td>
                        <td>
                            <a href="{{ route('admin.recetas.edit', $receta->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('admin.recetas.delete', $receta->id) }}" method="POST"
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
