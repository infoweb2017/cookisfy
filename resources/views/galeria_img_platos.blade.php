<!-- garleria.blade.php -->
@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="display-6 text-center mb-10 mt-10">Galería de Platos</h2>
        <div class="row">
            @foreach ($imagenes as $imagen)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="{{ asset('' . $imagen) }}" class="card-img-top" alt="Plato">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
