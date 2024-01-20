@extends('layouts.app')

@section('content')
    <div class="container-confirmacion">
        <h1 class="mt-4 mb-4 text-center">¡Consulta Enviada!</h1>
        <p class="text-center">Gracias por ponerte en contacto con nosotros. Tu consulta ha sido enviada con éxito.</p>
        <p class="text-center">Recibirás una respuesta en breve.</p>

        {{-- Enlace de regreso a la página de inicio --}}
        <div class="text-center mt-4">
            <a href="{{ route('index') }}" class="btn btn-primary">Volver a Inicio</a>
        </div>
    </div>
@endsection
