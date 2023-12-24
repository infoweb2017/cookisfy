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
                        <p>Mis Recetas</p>
                    </div>
                </div>


            </div>
        </div>
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
