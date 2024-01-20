@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <h2>Editar Usuario</h2>
        <form method="POST" action="{{ route('admin.usuarios.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
