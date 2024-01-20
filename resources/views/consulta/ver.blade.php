<!-- resources/views/consulta/ver.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container-consulta mt-5">
    <h1 class="mb-4">Detalle de la Consulta</h1>
    <div class="card tarjeta-consulta">
        <div class="card-body tarjeta-cuerpo">
            <p class="card-text tarjeta-texto"><strong>Nombre:</strong> {{ $consulta->nombre }}</p>
            <p class="card-text  tarjeta-texto"><strong>Correo:</strong> {{ $consulta->correo }}</p>
            <p class="card-text  tarjeta-texto"><strong>Teléfono:</strong> {{ $consulta->telefono }}</p>
            <p class="card-text  tarjeta-texto"><strong>Consulta:</strong> {{ $consulta->consulta }}</p>
        </div>
    </div>
</div>
@endsection
