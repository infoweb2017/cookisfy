@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Comentar en la receta "{{ $receta->titulo }}"</h2>

    @if ($errors->any())
    <div class="alert alert-danger mt-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('comentarios.store', $receta->id) }}" method="POST" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="comentario">Comentario</label>
            <textarea class="form-control" id="comentario" name="comentario" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Comentario</button>
    </form>
</div>
@endsection
