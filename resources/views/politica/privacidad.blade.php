<!-- resources/views/politica/privacidad.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Contenido de la Política de Privacidad -->

    <div class="container-privacidad my-5">
        <h2 class="h-politica-p">Política de Privacidad</h2>
        <p class="p-politica-p">En esta sección, describimos cómo recopilamos, almacenamos y utilizamos la información
            personal de nuestros usuarios. Al utilizar nuestro sitio web, usted acepta nuestra Política de Privacidad y el
            procesamiento de sus datos personales de acuerdo con la misma.</p>

        <h3 class="h-politica-p">Información que recopilamos</h3>
        <p class="p-politica-p">Recopilamos información personal que usted proporciona voluntariamente al registrarse en
            nuestro sitio web, suscribirse a boletines informativos, participar en encuestas o interactuar con nuestras
            funciones y servicios.</p>

        <h3 class="h-politica-p">Uso de la información</h3>
        <p class="p-politica-p">Utilizamos la información personal para mejorar nuestros servicios, personalizar su
            experiencia, enviar comunicaciones, proporcionar contenido relevante y garantizar el funcionamiento adecuado del
            sitio web.</p>

        <h3 class="h-politica-p">Protección de datos</h3>
        <p class="p-politica-p">Nos comprometemos a proteger sus datos personales y mantenerlos seguros. Implementamos
            medidas de seguridad adecuadas para evitar el acceso no autorizado, la divulgación o el uso indebido de su
            información personal.</p>

        <h3 class="h-politica-p">Divulgación de información</h3>
        <p class="p-politica-p">No compartiremos su información personal con terceros sin su consentimiento previo, a menos
            que sea necesario para cumplir con requisitos legales o para proporcionar nuestros servicios.</p>

        <h3 class="h-politica-p">Más información</h3>
        <p class="p-politica-p">Para obtener más detalles sobre nuestra Política de Privacidad y cómo puede ejercer sus
            derechos de privacidad, consulte la política completa.<a href="{{ route('privacidad') }}">aquí</a></p>
    </div>
@endsection
