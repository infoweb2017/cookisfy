@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4" style="font-family: 'Roboto', sans-serif;">¡Consulta Enviada!</h1>
    <p style="font-family: 'Roboto', sans-serif;">Gracias por ponerte en contacto con nosotros. Tu consulta ha sido enviada con éxito.</p>
    <p style="font-family: 'Roboto', sans-serif;">Recibirás una respuesta en breve.</p>

    {{-- Enlace de regreso a la página de inicio o a donde desees --}}
    <a href="{{ route('bienvenida') }}" class="btn btn-primary" style="background-color: #FFD700; font-family: 'Roboto', sans-serif;">Volver a Inicio</a>
</div>
@endsection
