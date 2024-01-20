<!-- faq.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4 bg-body-tertiary">Preguntas Frecuentes</h2>

        <!-- FAQ sobre el Uso de la Aplicación -->
        <h3 class="text-center h3-faq">Uso de la Aplicación</h3>
        <div class="faq-section my-5">
            <div class="faq">
                <h4>¿Cómo puedo crear y guardar mis propias recetas?</h4>
                <p>Para crear una receta, ve a la sección 'Crear Receta' en tu perfil. Allí podrás introducir los detalles
                    de tu receta, incluyendo ingredientes, pasos y una foto. Una vez completada, haz clic en 'Guardar'.</p>
            </div>
            <div class="faq">
                <h4>¿Cómo busco recetas</h4>
                <p>En nuestra página de búsqueda.Simplemente introduce el nombre de ingrediente o una receta y te
                    mostraremos
                    las recetas que los utilizan.</p>
            </div>
            <div class="faq">
                <h4>¿Hay alguna forma de compartir mis recetas favoritas con otros usuarios?</h4>
                <p>Sí, cada receta tiene una opción de 'Compartir'. Puedes usarla para enviar
                    compartirlas en redes sociales.</p>
            </div>
            <div class="faq">
                <h4>¿Cómo puedo cambiar mi información de perfil o contraseña?</h4>
                <p>Para cambiar tu información de perfil o contraseña, ve a la configuración de tu cuenta. Allí podrás
                    actualizar tus datos personales, foto de perfil y cambiar tu contraseña.</p>
            </div>
        </div>

        <!-- FAQ sobre Cocina y Recetas -->
        <h3 class="text-center h3-faq">Cocina y Recetas</h3>
        <div class="faq-section">
            <div class="faq">
                <h4>¿Qué ingredientes debería tener siempre en mi cocina?</h4>
                <p>Recomendamos tener siempre ingredientes básicos como harina, azúcar, huevos, leche, aceite de oliva,
                    hierbas y especias variadas, y un surtido de vegetales frescos.</p>
            </div>
            <div class="faq">
                <h4>¿Cuál es la mejor manera de conservar frutas y verduras frescas?</h4>
                <p>La mayoría de las frutas se conservan mejor en el refrigerador, excepto tomates y bananas. Las verduras
                    frescas deben guardarse en el cajón de verduras de tu refrigerador, y algunas, como las patatas, en un
                    lugar fresco y oscuro.</p>
            </div>
            <div class="faq">
                <h4>¿Qué puedo usar si no tengo un ingrediente específico?</h4>
                <p>En muchas recetas, puedes realizar sustituciones. Por ejemplo, si no tienes mantequilla, a menudo puedes
                    usar aceite. Consulta nuestra sección de 'Sustituciones' para encontrar alternativas a ingredientes
                    comunes.</p>
            </div>
            <div class="faq">
                <h4>¿Tienen consejos para cocinar platos específicos, como pasteles o carnes?</h4>
                <p>Sí, en cada receta proporcionamos consejos específicos para asegurarte de que tu plato salga perfecto.
                    Además, nuestro blog cuenta con numerosos trucos y técnicas de cocina.</p>
            </div>
        </div>
    </div>
@endsection
