<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">

    <title>{{ config('app.name', 'Cookisfy') }}</title>
</head>

<body>
    @include('layouts.navigation-admin')

    <main class="principal">

        <div class="container-fluid max-w-7xl mx-auto p-6 lg:p-8 ">
            <div class="flex justify-center">
                <h1>Aqui irá toda la administracion de la web</h1>
            </div>
        </div>
    </main>

    <!-- Inicio Footer-->
    <div class="bg-main my-5">
        <footer class=" container-fluid  bg-emerald-600 text-center text-white">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
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

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(75, 72, 72, 0.2);">
                © 2020 Copyright:
                <a class="text-white" href="#">Cookisfy</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div><!-- Fin Footer-->
</body>

</html>
