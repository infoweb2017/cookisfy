{{-- receta.inicio --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Recetas</h1>
        @if ($recetas->count() > 0)
            <div class="row">
                @foreach ($recetas as $receta)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            @if ($receta->imagen)
                                <img src="{{ asset('storage/' . $receta->imagen) }}" class="card-img-top"
                                    alt="Imagen de la receta">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $receta->titulo }}</h5>
                                <p class="card-text">{{ Str::limit($receta->descripcion, 250) }}</p>

                                {{-- Mostrar los primeros pasos de la receta --}}
                                @if ($receta->pasos)
                                    <ul class="list-unstyled">
                                        @foreach ($receta->pasos->take(3) as $paso)
                                            <li>Paso {{ $paso->solicitar }}: {{ Str::limit($paso->pasos, 50) }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                {{-- Mostrar los comentarios --}}
                                <div class="comentarios">
                                    <h5>Comentarios</h5>
                                    @if ($receta->comentarios->count() > 0)
                                        @foreach ($receta->comentarios as $comentario)
                                            <p>{{ $comentario->user->name }}: {{ $comentario->descripcion }}</p>
                                        @endforeach

                                        @foreach ($receta->comentarios as $comentario)
                                            <div class="comentario">
                                                <p>{{ $comentario->descripcion }}</p>
                                                @if (auth()->check() && $comentario->user_id == auth()->user()->id)
                                                    <!-- Mostrar formulario de edición para el usuario propietario del comentario -->
                                                    <button class="btn btn-banner"
                                                        id="editarComentario{{ $comentario->id }}"
                                                        onclick="mostrarFormulario({{ $comentario->id }})">Editar</button>
                                                    <form id="formularioEditar{{ $comentario->id }}" style="display: none;"
                                                        action="{{ route('comentarios.update', $comentario->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <textarea name="descripcion" required class="form-control">{{ $comentario->descripcion }}</textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </form>
                                                @endif
                                            </div>
                                        @endforeach
                                    @else
                                        <p>No hay comentarios aún.</p>
                                    @endif
                                </div>
                                <a href="{{ route('recetas.show', $receta->id) }}" class="btn btn-primary-recetas">Ver
                                    más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No hay recetas creadas aún.</p>
        @endif
        <script>
            /**Mostrar comentario y editarlo */
            function mostrarFormulario(comentarioId) {
                var botonEditar = document.getElementById('editarComentario' + comentarioId);
                var formularioEditar = document.getElementById('formularioEditar' + comentarioId);

                if (botonEditar && formularioEditar) {
                    botonEditar.style.display = 'none';
                    formularioEditar.style.display = 'block';
                }
            }
        </script>
    </div>
@endsection
