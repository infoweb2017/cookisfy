@extends('layouts.app') <!-- Asegúrate de que 'layouts.app' sea tu plantilla principal en Blade -->

@section('content')
    <!-- Encabezado de la página -->
    <div class="container mt-4">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h2 class="font-weight-bold">Dashboard</h2>
            </div>
            <div class="card  text-center bg-body-tertiary">
                <div class="card-body">
                    <h4> Bienvenido {{ auth()->user()->name }} </h4>
                </div>
            </div>
        </div>
    </div>
@endsection
