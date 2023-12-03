@extends('layouts.app') 

@section('content')
<div class="container">
    
<h1 class="mt-4 mb-4" style="font-family: 'Roboto', sans-serif;">Sobre Nosotros</h1>
    
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/about_us_image.jpg') }}" alt="Imagen de Sobre Nosotros" class="img-fluid">
        </div>
        <div class="col-md-6">
            
    
<p style="font-family: 'Roboto', sans-serif;">Somos amantes de la cocina y la gastronomía. Nuestra pasión por la comida nos llevó a crear esta aplicación de recetas de cocina, donde compartimos nuestras mejores recetas y consejos culinarios con la comunidad.</p>
            <p style="font-family: 'Roboto', sans-serif;">En nuestra plataforma, encontrarás una amplia variedad de recetas, desde platos tradicionales hasta innovadoras creaciones gourmet. Nos esforzamos por proporcionar instrucciones detalladas y consejos útiles para que puedas preparar deliciosas comidas en casa.</p>
            <p style="font-family: 'Roboto', sans-serif;">¡Esperamos que disfrutes explorando nuestras recetas y que te inspiren a convertirte en un chef en tu propia cocina!</p>
        </div>
    </div>
</div>
@endsection