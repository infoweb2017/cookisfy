@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="display-6 text-center mb-10 mt-10">Galería de Recetas</h2>
        <!-- Sección de recetas con descripción -->
        <div class="row">
            @if (isset($recetas))
                @foreach ($recetas as $receta)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $receta->imagen) }}" alt="{{ $receta->titulo }}" class="card-img-top"
                                data-bs-toggle="modal" data-bs-target="#recetaModal{{ $receta->id }}">
                            <div class="card-body">
                                <h3 class="card-title">{{ $receta->titulo }}</h3>
                                <p class="card-text descripcion-corta">{{ $receta->descripcion }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Modal para mostrar más información de la receta -->
                    <div class="modal fade" id="recetaModal{{ $receta->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="recetaModalLabel{{ $receta->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="recetaModalLabel{{ $receta->id }}">
                                        {{ $receta->titulo }}</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('storage/' . $receta->imagen) }}" alt="{{ $receta->titulo }}"
                                        class="img-fluid mb-2">
                                    <p>
                                    <blockquote><b>Descripción:</b></blockquote> {{ $receta->descripcion }}</p>
                                    <p>
                                    <blockquote><b>Ingredientes:</b></blockquote> {{ $receta->ingredientes }}</p>
                                    <p>
                                        <blockquote><b>Pasos:</b></blockquote>{{ $receta->comentarios }}</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No hay recetas disponibles.</p>
            @endif
        </div><!-- Fin Sección de recetas con descripción -->
    </div>

    <script>
        $(document).ready(function() {
            // Inicializar los modales de Bootstrap
            $('[data-toggle="modal"]').modal();
        });
    </script>
@endsection
