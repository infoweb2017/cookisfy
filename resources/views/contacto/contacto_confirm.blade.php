@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">¡Consulta Enviada!</h1>
    <p>Gracias por ponerte en contacto con nosotros. Tu consulta ha sido enviada con éxito.</p>
    <p>Recibirás una respuesta en breve.</p>

    {{-- Enlace de regreso a la página de inicio o a donde desees --}}
    <a href="{{ route('index') }}" class="btn btn-primary">Volver a Inicio</a>
</div>
@endsection
