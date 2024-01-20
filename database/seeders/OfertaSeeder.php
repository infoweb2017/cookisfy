<?php

namespace Database\Seeders;
use App\Models\Ofertas;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ofertas = [
            [
                'titulo' => 'Kits de inicio para principiantes',
                'descripcion' => 'Si eres un amante de la cocina japonesa, te presentamos este kit de sushi
                completo.Si deseas preparar tus platos favoritos pero no te has atrevido antes, ahora te lo ponemos
                más fácil que nunca. En este set encontrarás todo lo necesario para hacer maki rolls, uramakis,
                niguiris, oniguiris ... de principio a fin.',
                'url' => 'https://amzn.eu/d/1DqG74O',
                'imagen' => 'images/ofertas/oferta-1.jpg',
            ],
            [
                'titulo' => 'Curso online de Cocina Vegana',
                'descripcion' => '>Nuestros cursos gratuitos, subvencionados por el SEPE o el Ministerio de
                Educación, Formación Profesional y Deportes, son la mejor opción para impulsar tu carrera profesional o
                invertir en tu desarrollo personal.',
                'url' => 'https://escuelavegetariana.com/producto/curso-online-de-cocina-vegana-descuento-alumno-a/',
                'imagen' => 'images/ofertas/oferta-2.jpg',
            ],
            [
                'titulo' => 'Guías en alimentación',
                'descripcion' => 'Las Guías en Alimentación son pautas que, de una forma práctica y en un
                lenguaje sencillo, orientan a la población general sobre el consumo de alimentos que resulta
                más aconsejable para conseguir una dieta correcta que aporte las cantidades aconsejadas de
                energía y nutrientes.',
                'url' => 'https://www.ucm.es/idinutricion/guias-en-alimentacion',
                'imagen' => 'images/ofertas/oferta-3.jpg',
            ],
            [
                'titulo' => 'Libros de recetas con descuento',
                'descripcion' => '>¡Que empiece la fiesta culinaria!Hoy cocinan ellos es el libro perfecto
                para familias que quieren disfrutar de la cocina. Encontrarás recetas super fáciles y rápidas.',
                'url' => 'https://www.fnac.es/n44181/Libros-de-cocina-y-gastronomia/Libros-de-cocina-mas-vendidos',
                'imagen' => 'images/ofertas/libros_recetas.jpg',
            ],
            [
                'titulo' => 'Electrodoméstico HASTA -20%',
                'descripcion' => 'El corte ingles ofrece una gran variedad de ofertas de equipos
                Electrodomésticos.',
                'url' => 'https://www.elcorteingles.es/electrodomesticos/?gad_source=1&gclid=CjwKCAiAqY6tBhAtEiwAHeRopSQSdr_0lpctpvXlwXha7Q3yV2DYJyL3mxCRYh_rZbdkMGSamjOOcRoCj1wQAvD_BwE&gclsrc=aw.ds',
                'imagen' => 'images/ofertas/oferta-4.jpg',
            ],

            [
                'titulo' => 'Enogastronómico del año en Ribera',
                'descripcion' => 'El 30 de septiembre tienes una cita obligada en uno de los lugares más
                emblemáticos de Ribera del Duero. Cuatro bodegas de élite han organizado un evento único con
                catas, teatro, música y maridajes con platos diseñados por varios chefs con estrellas
                Michelin y soles Repsol.',
                'url' => 'https://www.vinoseleccion.com/evento-gastronomico-ribera',
                'imagen' => 'images/ofertas/oferta-5.webp',
            ],
        ];

        foreach ($ofertas as $oferta) {
            // Verifica si la oferta ya existe en la base de datos
            $existente = Ofertas::where('titulo', $oferta['titulo'])->first();

            if (!$existente) {
                // Crea un nueva oferta en la base de datos
                Ofertas::create($oferta);
            }
        }
    }
}
