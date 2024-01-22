<!-- resources/views/admin/comentarios/lista.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <h2>Listado de Comentarios por Usuarios y Recetas</h2>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Usuario</th>
                    <th>Receta</th>
                    <th>Comentario</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comentarios as $comentario)
                    <tr>
                        <th scope="row">{{ $comentario->id }}</th>
                        <td>{{ $comentario->user->name }}</td>
                        <td>{{ $comentario->receta->titulo }}</td>
                        <td>{{ $comentario->descripcion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
