<?php

namespace Database\Seeders;

use App\Models\Receta;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecetaSeeder extends Seeder
{
    /**
     * Ejecuta los seeders a la BD.
     */
    public function run(): void
    {
        // Me aseguró de que haya al menos un usuario en la base de datos
        $user = User::first();
        $recetas = [
            [
                'user_id' => $user->id,// Asignar el 'user_id'
                'titulo' => 'Paella Valenciana', 'ingredientes' => 'arroz 400g,pollo 200g,conejo 200g, judías verdes 100g,tomate 1, azafrán, aceite de oliva, sal, agua',
                'descripcion' => 'Cortar el pollo y el conejo en trozos y freírlos en una paella con aceite. Añadir las judías y el tomate troceado. Agregar el arroz y cubrir con agua. Sazonar con azafrán y sal. Cocinar a fuego medio hasta que el arroz esté hecho.',
                'categoria' => 'Arroces, Mediterránea', 'tiempo_preparacion' => '60 minutos', 'categoria_id' => 42, 'imagen' => '/assets/imagenes-recetas/paella_valenciana.jpg'
            ],

            [
                'user_id' => $user->id, 
                'titulo' => 'Arroz al Horno', 'ingredientes' => '2 tazas de arroz,4 tazas de caldo de pollo o carne,1 chorizo cortado en rodajas,1/2 taza de tomate triturado, 1 cabeza de ajos
            ,1 patata cortada en rodajas,1/2 taza de garbanzos cocidos, 1 pimiento rojo cortado en tiras,Aceite de oliva,Sal, 1 pizca de azafrán o colorante alimentario',
                'descripcion' => 'Precalienta el horno a 200°C.En una sartén, fríe el chorizo y reserva,en la misma sartén, añade un poco de aceite y sofríe las patatas hasta que estén doradas. Reserva.
            En una cazuela apta para horno, sofríe el arroz con un poco de aceite hasta que esté translúcido, añade el tomate triturado, los garbanzos, el chorizo, las patatas y el pimiento. Mezcla bien.
            Agrega el caldo caliente y el azafrán. Rectifica de sal,introduce la cabeza de ajos en el centro y lleva a ebullición, cubre con papel aluminio y hornea durante 30-35 minutos o hasta que el arroz esté cocido y el líquido se haya absorbido.
            Deja reposar unos minutos antes de servir.',
                'categoria' => 'Arroces, Mediterránea', 'tiempo_preparacion' => '60 minutos', 'categoria_id' => 42, 'imagen' => '/build/assets/imagenes-recetas/arroz_horno.jpg'
            ],

            [
                'user_id' => $user->id, 
                'titulo' => 'Paella de Marisco', 'ingredientes' => '2 tazas de arroz para paella, 4 tazas de caldo de pescado,200g de gambas peladas,200g de calamares en rodajas
            ,200g de mejillones limpios,1 pimiento rojo cortado en tiras,1/2 taza de tomate triturado,1 diente de ajo picado,1 cebolla pequeña picada,Aceite de oliva, Sal,1 pizca de azafrán',
                'descripcion' => 'En una paellera, calienta un poco de aceite y sofríe la cebolla y el ajo, añade el pimiento y sofríe hasta que esté tierno,incorpora los calamares y fríe durante unos minutos.
            Añade el tomate triturado y cocina hasta que reduzca, agrega el arroz y sofríe durante un par de minutos,vierte el caldo de pescado caliente y el azafrán. Mezcla bien y cocina durante 10 minutos.
            Agrega las gambas y los mejillones. Cocina hasta que los mejillones se abran y el arroz esté cocido, aproximadamente 10-15 minutos más, retira del fuego y deja reposar unos minutos antes de servir.',
                'categoria' => 'Arroces, Mediterránea', 'tiempo_preparacion' => '60 minutos', 'categoria_id' => 42, 'imagen' => '/assets/imagenes-recetas/paella_marisco.jpg'
            ],
        ];

        foreach ($recetas as $receta) {
            // Verifica si el ingrediente ya existe en la base de datos
            $existente = Receta::where('titulo', $receta['titulo'])->first();

            if (!$existente) {
                // Crea un nuevo ingrediente en la base de datos
                Receta::create($receta);
            }
        }
    }
}
