@extends('layouts.admin')

@section('content')
    <div class="container mt-5 border rounded p-4" style="background-color: #e0c1c1;">
                <div class="row justify-content-center border-red-500"> 
            <div class="col-md-6"> 
                <form method="POST" action="{{ route('admin.usuarios.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmar Contraseña:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Tipo:</label>
                        <div class="form-check">
                            <input type="radio" name="is_admin" id="admin" value="1" class="form-check-input">
                            <label for="admin" class="form-check-label">Administrador</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="is_admin" id="usuario" value="0" class="form-check-input"
                                checked>
                            <label for="usuario" class="form-check-label">Usuario Normal</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Usuario</button>
                </form>
            </div>
        </div>
    </div>
@endsection
