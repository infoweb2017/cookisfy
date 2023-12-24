<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Cookisfy') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
    <!-- ... Otros encabezados ... -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" href="{{ asset('build/assets/logo/logo_mini.ico') }}" type="image/icon" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <!-- Inicio Footer -->
    <div class="bg-main my-5">
        <footer class="container-fluid text-primary-emphasis bg-primary-subtle border border-primary-subtle">
            <!-- Grid container -->
            <div class="container p-4 pb-0 text-center">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #677caa;" href="#!"
                        role="button"><i class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #55a2dd;" href="#!"
                        role="button"><i class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #b85447;" href="#!"
                        role="button"><i class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #664166;" href="#!"
                        role="button"><i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca;" href="#!"
                        role="button"><i class="fab fa-linkedin-in"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Contacto -->
            <section class="mb-4">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item m-1">
                        <h4>Contacto</h4></i>
                    </li>
                    <li class="nav-item">
                        <p><b>Teléfono: </b>(+34) 963 102 986</p>
                    </li>
                    <li class="nav-item">
                        <p><b>Email: </b>info@cookisfy.es</p></i>
                    </li>
                </ul>
            </section>
            <!-- Enlaces -->
            <div class="text-center p- text-bg-nav-link">
                <ul class="list-unstyled">
                    <li class="d-inline-block mr-4">
                        <a class="nav-link" href="{{ route('sobrenosotros') }}">Sobre Nosotros |</a>
                    </li>
                    <li class="d-inline-block mr-4"><a class="nav-link" href="{{ route('cookies') }}">Política de
                            Cookies |</a></li>
                    <li class="d-lg-inline-block"><a class="nav-link" href="{{ route('privacidad') }}">Política de
                            Privacidad</a></li>
                </ul>
            </div>

            <!-- Copyright -->
            <div class="text-center p-4" id="copy-right">
                © 2023 Copyright:
                <a class="text-copy" href="{{ route('inicio') }}">Cookisfy</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
    <!-- Fin Footer -->

</body>

</html>
