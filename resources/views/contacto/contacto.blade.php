@extends('layouts.app')

@section('content')
    <div class="container w-50">
        <h1 class="mt-5 mb-5 text-center">Formulario de Contacto</h1>
        <form action="{{ route('contacto.store') }}" method="POST">
            @csrf {{-- Agrega el token CSRF para proteger el formulario --}}

            {{-- Campo para el nombre --}}
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>

            {{-- Campo para los apellidos --}}
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" class="form-control" required>
            </div>

            {{-- Campo para el teléfono --}}
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" required>
            </div>

            {{-- Campo para el correo electrónico --}}
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" class="form-control" required>
            </div>

            {{-- Campo para la consulta o comentario --}}
            <div class="form-group">
                <label for="consulta">Consulta o Comentario:</label>
                <textarea id="consulta" name="consulta" class="form-control" required></textarea>
            </div>

            {{-- Casilla de verificación para aceptar la política de privacidad --}}
            <div class="form-group form-check">
                <input type="checkbox" id="aceptar_politica" name="aceptar_politica" class="form-check-input" required>
                <label class="form-check-label" for="aceptar_politica">Acepto la política de privacidad</label>
            </div>

            {{-- Botón para enviar el formulario --}}
            <button type="submit" class="btn btn-primary">Enviar Consulta</button>
        </form>
    </div>
@endsection
