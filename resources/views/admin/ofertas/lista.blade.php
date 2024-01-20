<!-- resources/views/admin/recetas/lista.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <h2>Listado de ofertas</h2>

        <!-- Botón para crear una nueva oferta -->
        <a href="{{ route('admin.ofertas.create') }}" class="btn btn-primary mb-3">Nueva Oferta</a>

        <!-- Tabla de oferta -->
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ofertas as $oferta)
                    <tr>
                        <th scope="row">{{ $oferta->id }}</th>
                        <td>{{ $oferta->titulo }}</td>
                        <td>
                            <a href="{{ route('admin.ofertas.edit', $oferta->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('admin.ofertas.delete', $oferta->id) }}" method="POST"
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
