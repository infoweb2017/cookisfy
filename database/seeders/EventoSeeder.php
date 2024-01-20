<?php

namespace Database\Seeders;

use App\Models\Evento;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventos = [
            [
                'titulo' => 'Eventos de gastronomía Castellón',
                'descripcion' => 'Castellón cuenta con un buen número de citas anuales en las que disfrutar
                de
                jornadas gastronómicas temáticas. Estas giran en torno a productos tan especiales como la
                aromática trufa negra, la singular alcachofa con Denominación de Origen en Benicarló o los
                deliciosos langostinos de Vinaròs.',
                'url' => 'https://www.comunitatvalenciana.com/es/mediterraneo-en-accion/trufa-negra',
                'imagen' => 'images/eventos/envento1.jpg',
            ],
            [
                'titulo' => 'Eventos de gastronomía Valencia',
                'descripcion' => 'En la provincia de Valencia se celebra por todo lo alto la calidad y la
                versatilidad de su arroz, a través de
                jornadas que no solo encuentran al mejor cocinero de paella valenciana del mundo, sino que
                dan a conocer las variedades, la cultura
                y el paisaje vinculado con este cereal tan representativo de la Comunitat Valencian.',
                'url' => 'https://www.comunitatvalenciana.com/mediterraneo-en-accion/paella-valenciana-1',
                'imagen' => 'images/eventos/evneto_vinos.jpg',
            ],
            [
                'titulo' => 'Eventos de gastronomía Alicante',
                'descripcion' => 'Alicante cuenta con una gran cultura gastronómica que se manifiesta en
                jornadas gastronómicas temáticas en torno a los deliciosos platos de épocas con tanta
                tradición como la Cuaresma y Semana Santa, u otras más lúdicas en las que tapas y pinchos se
                convierten en la excusa con la que visitar ciudades llenas de encanto.',
                'url' => 'https://www.comunitatvalenciana.com/es/mediterraneo-en-accion/alicante-ciudad-del-arroz',
                'imagen' => 'images/eventos/alicante-ciudad-del-arroz.jpg',
            ],
        ];

        foreach ($eventos as $evento) {
            // Verifica si el evento ya existe en la base de datos
            $existente = Evento::where('titulo', $evento['titulo'])->first();

            if (!$existente) {
                // Crea un nuevo evento en la base de datos
                Evento::create($evento);
            }
        }
    }
}
