@extends('layouts.app') {{-- Si estás utilizando un diseño base con Bootstrap --}}

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Formulario de Contacto</h1>
    <form action="{{ route('contacto.submit') }}" method="POST">
        @csrf {{-- Agrega el token CSRF para proteger el formulario --}}
        
        {{-- Campo para el nombre --}}
        <div class="form-group">
            <label for="nombre" style="font-family: 'Roboto', sans-serif;">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" style="font-family: 'Roboto', sans-serif;" required>
        </div>
        
        {{-- Campo para los apellidos --}}
        <div class="form-group">
            <label for="apellidos" style="font-family: 'Roboto', sans-serif;">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" class="form-control" style="font-family: 'Roboto', sans-serif;" required>
        </div>

        {{-- Campo para el teléfono --}}
        <div class="form-group">
            <label for="telefono" style="font-family: 'Roboto', sans-serif;">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" class="form-control" style="font-family: 'Roboto', sans-serif;" required>
        </div>
        
        {{-- Campo para el correo electrónico --}}
        <div class="form-group">
            <label for="correo" style="font-family: 'Roboto', sans-serif;">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" class="form-control" style="font-family: 'Roboto', sans-serif;" required>
        </div>
        
        {{-- Campo para la consulta o comentario --}}
        <div class="form-group">
            <label for="consulta" style="font-family: 'Roboto', sans-serif;">Consulta o Comentario:</label>
            <textarea id="consulta" name="consulta" class="form-control" style="font-family: 'Roboto', sans-serif;" required></textarea>
        </div>
        
        {{-- Casilla de verificación para aceptar la política de privacidad --}}
        <div class="form-group form-check">
            <input type="checkbox" id="aceptar_politica" name="aceptar_politica" class="form-check-input" required>
            <label class="form-check-label" for="aceptar_politica" style="font-family: 'Roboto', sans-serif;">Acepto la política de privacidad</label>
        </div>
        
        {{-- Botón para enviar el formulario --}}
        <button type="submit" class="btn btn-primary" style="background-color: #FFD700; font-family: 'Roboto', sans-serif;">Enviar Consulta</button>
    </form>
</div>
@endsection
