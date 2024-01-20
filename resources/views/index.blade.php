<!-- index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 m-2 badge">
                <div class="card  text-center bg-body-tertiary">
                    <div class="card-body" id="estadoSesion">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('Ha iniciado sesión.') }}

                    </div>
                </div>
            </div>
        </div>
        {{-- Eventos --}}
        <div class="container mt-4">
            <h2>Próximos Eventos</h2>
            <div class="row">
                <!-- Tarjeta de Evento -->
                @foreach ($eventos as $evento)
                    <div class="col-md-4 w-20">
                        <div class="card evento-card">
                            <img class="card-img" src="{{ asset('storage/' . $evento->imagen) }}" alt="Imagen del Evento">
                            <div class="card-body">
                                <h5 class="card-title">{{ $evento->titulo }}</h5>
                                <p class="card-text">{{ $evento->descripcion }}</p>
                                <a href="{{ $evento->url }}" class="btn btn-primary" target="_blank">Más Información</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>{{-- FIn Eventos --}}

        {{-- Ofertas --}}
        <div class="container mt-2">
            <h2>Ofertas Especiales</h2>
            <div class="row">
                <!-- Tarjeta de Oferta -->
                @foreach ($ofertas as $oferta)
                    <div class="col-md-2">
                        <div class="card ofertas">
                            <img class="card-img" src="{{ asset('storage/' . $oferta->imagen) }}" alt="Imagen del Evento">
                            <div class="card-body">
                                <h5 class="card-title">{{ $oferta->titulo }}</h5>
                                <p class="card-text">{{ $oferta->descripcion }}</p>
                                <a href="{{ $evento->url }}" class="btn btn-primary" target="_blank">Más Información</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>{{-- FIn de ofertas --}}

        {{-- Testimonios --}}
        <div class="container h-auto bg-body-tertiary mb-5 mt-4">
            <div id="testimoniosCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card tarjeta-testimonio">
                            <div class="card-body">
                                <p class="texto-testimonio">"¡Esta receta fue increíble! Fácil de seguir y el resultado fue
                                    delicioso."</p>
                                <h5 class="card-title">- José L.</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Repite esto para cada testimonio -->
                    <div class="carousel-item">
                        <div class="card tarjeta-testimonio">
                            <div class="card-body">
                                <p class="texto-testimonio">"Descubrí este sitio buscando recetas saludables y me he
                                    convertido en
                                    una fan incondicional. Cada receta que he probado ha sido un éxito total en casa.
                                    ¡Gracias por
                                    hacer la cocina tan accesible y deliciosa!"</p>
                                <h5 class="card-title">- Maria de los A.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card tarjeta-testimonio">
                            <div class="card-body">
                                <p class="texto-testimonio">"Como principiante en la cocina, siempre me sentí intimidado
                                    por
                                    recetas
                                    complicadas. Pero aquí encontré tutoriales que me guiaron paso a paso, y ahora me siento
                                    mucho
                                    más seguro. ¡He impresionado a mis amigos con mis nuevos platos!"</p>
                                <h5 class="card-title">- Eugenio C.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card tarjeta-testimonio">
                            <div class="card-body">
                                <p class="texto-testimonio">"Siempre he disfrutado cocinar, pero este sitio ha llevado mi
                                    pasión a otro
                                    nivel. Las ideas creativas y los consejos útiles han enriquecido mi experiencia
                                    culinaria. ¡Es mi
                                    fuente número uno para inspiración en la cocina!"</p>
                                <h5 class="card-title">- Carolina H.</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimoniosCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimoniosCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div><!--FIn de testimonios -->

        <!-- Videos o tutoriales -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/8FmjFTrBbt8?autoplay=1"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                        <p class="card-text">Gastronomía comunidad Valenciana.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <iframe width="100%" height="200"
                            src="https://www.youtube.com/embed/00N8It1ih2M?si=dY3oyRKqVneOuU5O" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                        <p class="card-text">Todo el Sabor, Color y Aroma de la Cocina Mediterránea.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/v8IWx1hkqSc?autoplay=1"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                        <p class="card-text">Vive la gastronomía de València</p>
                    </div>
                </div>
            </div>
        </div><!-- Fin de videos o tutoriales -->
    </div>

    <script>
        let estadoSesion = document.getElementById('estadoSesion');
        if (estadoSesion) {
            setTimeout(function() {
                let efectoFundido = setInterval(function() {
                    if (!estadoSesion.style.opacity) {
                        estadoSesion.style.opacity = 1;
                    }
                    if (estadoSesion.style.opacity > 0) {
                        estadoSesion.style.opacity -= 0.1;
                    } else {
                        clearInterval(efectoFundido);
                        estadoSesion.style.display = 'none';
                    }
                }, 200);
            }, 4000);
        }
        /* document.addEventListener("DOMContentLoaded", function() {
              var estadoSesion = document.getElementById('estadoSesion');
              if (estadoSesion) {
                  setTimeout(function() {
                      estadoSesion.style.display = 'none';
                  }, 5000);
              }
          });*/
    </script>
@endsection
