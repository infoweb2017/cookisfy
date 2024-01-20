<!-- resources/views/admin/usuarios/lista.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <h2>Listado de Usuarios</h2>
        <a href="{{ route('admin.usuarios.create') }}" class="btn btn-l btn-success col-1 mb-2">Nuevo</a>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.usuarios.edit', $user->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('admin.usuarios.delete', $user->id) }}" method="POST"
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
