<!-- resources/views/admin/recetas/lista.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <h2>Listado de evento</h2>

        <!-- Botón para crear un evento -->
        <a href="{{ route('admin.eventos.create') }}" class="btn btn-primary mb-3">Nuevo Evento</a>

        <!-- Tabla de eventos -->
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventos as $evento)
                    <tr>
                        <th scope="row">{{ $evento->id }}</th>
                        <td>{{ $evento->titulo }}</td>
                        <td>
                            <a href="{{ route('admin.eventos.edit', $evento->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('admin.eventos.delete', $evento->id) }}" method="POST"
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
