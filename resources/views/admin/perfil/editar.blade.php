@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        {{ __('Perfil de Administrador') }}
                    </div>
                    <div class="card-body">
                        <!-- Incluye aquí el contenido del formulario de actualización de información de perfil -->
                        @include('perfil.partials.update-profile-information-form')
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header bg-info text-white">
                        <h3>Actualizar Contraseña</h3>
                    </div>
                    <div class="card-body">
                        <!-- Incluye aquí el contenido del formulario de actualización de contraseña -->
                        @include('perfil.partials.update-password-form')
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h3>Eliminar Usuario</h3>
                    </div>
                    <div class="card-body">
                        <!-- Incluye aquí el contenido del formulario para eliminar el usuario -->
                        @include('perfil.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
