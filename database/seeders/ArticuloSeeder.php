<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articulos = [
            [
                'titulo' => 'Tortitas de avena',
                'descripcion' => 'Una opción sana y deliciosa para empezar el día con alegría.
                Descubre la receta de tortitas de avena esponjosas más fácil
                del mundo y añádela a tu recetario de desayunos diarios.',
                'url' => 'https://www.hogarmania.com/cocina/recetas/tortitas-de-avena.html',
                'imagen' => 'images/articulos/toa-heftiba-MSxw2vpQzx4-unsplash.jpg',
            ],
            [
                'titulo' => 'Desayunos saludables',
                'descripcion' => 'El desayuno es el primer paso para afrontar el resto del día, ya que es la
                primera comida para la gran mayoría de las personas. Por este motivo, es importante que el desayuno
                sea completo, variado, equilibrado y satisfactorio.',
                'url' => 'https://www.nestlemenuplanner.es/desayuno-saludable.html?utm_source=BdD&utm_medium=email&utm_content=D2_CTA_Participa1Clic&utm_campaign=MenuPlanner_Febrero_2202&gad_source=1&gclid=Cj0KCQiAwP6sBhDAARIsAPfK_wbFbfZwywsUL1vgCKEOcfjrrS547Vm-mg4fdqXsSdRCrgPB1l3Dr7oaAtQjEALw_wcB&gclsrc=aw.ds',
                'imagen' => 'images/articulos/restaurant-breakfast.jpg',
            ],
            [
                'titulo' => 'Yogurt casero frutos rojos',
                'descripcion' => 'Una sencilla, pero rica y sobretodo saludable receta para prepararte un
                desayuno en menos de 5 minutos:Yogur con frutos del bosque y plátano.',
                'url' => 'https://www.pequerecetas.com/receta/yogur-casero-con-frutas-del-bosque/',
                'imagen' => 'images/articulos/strawberry-dessert-2191973_640.jpg',
            ],
            [
                'titulo' => 'Brochetas de verduras',
                'descripcion' => 'Las brochetas de verduras son manera más divertida y sabrosa de
                comer de forma saludable durante el verano.',
                'url' => 'https://okdiario.com/recetas/brochetas-verduras-50216',
                'imagen' => 'images/articulos/vegetable-skewer-3317060_640.jpg',
            ],
        ];

        foreach ($articulos as $articulo) {
            // Verifica si el articulo ya existe en la base de datos
            $existente = Articulo::where('titulo', $articulo['titulo'])->first();

            if (!$existente) {
                // Crea un nuevo articulo en la base de datos
                Articulo::create($articulo);
            }
        }
    }
}
