<!--- resources/views/layouts/footer_admin.blade.php -->
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
        <footer class="container-fluid text-primary-emphasis bg-secondary border border-primary-subtle">
            <!-- Grid container -->
            <div class="container p-4 pb-0 text-center">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #677caa;"
                        href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}"
                        target="_blank"" role="button"><i class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #55a2dd;"
                        href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}" target="_blank"
                        role="button"><i class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #b85447;"
                        href="https://www.google.com/search?q={{ urlencode(Request::url()) }}" target="_blank"
                        role="button"><i class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #664166;"
                        href="https://www.instagram.com/" target="_blank" role="button"><i
                            class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca;"
                        href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(Request::url()) }}"
                        target="_blank" role="button"><i class="fab fa-linkedin-in"></i></a>
                </section><!-- Section: Social media -->
            </div>
            <!-- Contacto -->
            <section class="mb-2">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item contacto m-1 ">
                        <h4 class="col-white">Contacto</h4></i>
                    </li>
                    <li class="nav-item">
                        <p class="col-white"><b>Teléfono: </b>(+34) 963 102 986</p>
                    </li>
                    <li class="nav-item">
                        <p class="col-white"><b>Email: </b><a href="mailto:cookisfy@gmail.com"
                                class="col-white">cookisfy@gmail.com</a></p>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand border-r" href="{{ route('admin.admin-dashboard') }}">
                            <img class="rounded-circle" src="{{ asset('/images/logo/logo_mini.1.png') }}" alt=""
                                height="76">
                        </a>
                    </li> <!-- Fin Logo -->
                </ul>
            </section>

            <!-- Copyright -->
            <div class="text-center p-4 col-white">
                © 2023 Copyright:
                <a class="col-white" href="{{ route('admin.admin-dashboard') }} ">Cookisfy</a>
            </div><!-- FIN Copyright -->
        </footer>
    </div> <!-- Fin Footer -->

</body>

</html>
