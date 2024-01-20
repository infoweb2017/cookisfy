<?php

namespace Database\Seeders;

use App\Models\Ingrediente;
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
                'user_id' => $user->id, // Asignar el 'user_id'
                'titulo' => 'Paella Valenciana',
                'ingredientes' => [
                    ['nombre' => 'arroz', 'cantidad' => 400, 'unidad' => 'g'],
                    ['nombre' => 'pollo', 'cantidad' => 200, 'unidad' => 'g'],
                    ['nombre' => 'conejo', 'cantidad' => 200, 'unidad' => 'g'],
                    ['nombre' => 'judías verdes', 'cantidad' => 100, 'unidad' => 'g'],
                    ['nombre' => 'tomate', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'azafrán', 'cantidad' => 1, 'unidad' => 'manojo'],
                    ['nombre' => 'aceite de oliva', 'cantidad' => 1, 'unidad' => 'cc'],
                    ['nombre' => 'sal', 'cantidad' => 2, 'unidad' => 'pizca'],
                    ['nombre' => 'agua', 'cantidad' => 1000, 'unidad' => 'ml'],
                ],
                'descripcion' => 'Cortar el pollo y el conejo en trozos y freírlos en una paella con aceite. Añadir las judías y el tomate troceado. Agregar el arroz y cubrir con agua. Sazonar con azafrán y sal. Cocinar a fuego medio hasta que el arroz esté hecho.',
                'categoria' => 'Arroces',
                'tiempo_preparacion' => '60 minutos',
                'categoria_id' => 43,
                'imagen' => 'images/imagenes-recetas/Paella_vlc.jpg'
            ],

            [
                'user_id' => $user->id,
                'titulo' => 'Arroz al Horno',
                'ingredientes' => [
                    ['nombre' => 'arroz', 'cantidad' => 2, 'unidad' => 'tazas'],
                    ['nombre' => 'caldo de pollo', 'cantidad' => 4, 'unidad' => 'tazas'],
                    ['nombre' => 'chorizo cortado en rodajas', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'tomate triturado', 'cantidad' => 1/2, 'unidad' => 'taza'],
                    ['nombre' => 'cabeza de ajos', 'cantidad' => 1, 'unidad' => 'cabeza'],
                    ['nombre' => 'patata cortada en rodajas', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'garbanzos cocidos', 'cantidad' => 1/2, 'unidad' => 'taza'],
                    ['nombre' => 'pimiento rojo', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'Aceite de oliva', 'cantidad' => 1/2, 'unidad' => 'oz'],
                    ['nombre' => 'pizca de azafrán', 'cantidad' => 1, 'unidad' => 'pizca'],
                    ['nombre' => 'sal', 'cantidad' => 2, 'unidad' => 'pizca'],
                    ['nombre' => 'agua', 'cantidad' => 1000, 'unidad' => 'ml'],
                ],
                'descripcion' => 'Precalienta el horno a 200°C.En una sartén, fríe el chorizo y reserva,en la misma sartén, añade un poco de aceite y sofríe las patatas hasta que estén doradas. Reserva.
                    En una cazuela apta para horno, sofríe el arroz con un poco de aceite hasta que esté translúcido, añade el tomate triturado, los garbanzos, el chorizo, las patatas y el pimiento. Mezcla bien.
                    Agrega el caldo caliente y el azafrán. Rectifica de sal,introduce la cabeza de ajos en el centro y lleva a ebullición, cubre con papel aluminio y hornea durante 30-35 minutos o hasta que el arroz esté cocido y el líquido se haya absorbido.
                    Deja reposar unos minutos antes de servir.',
                'categoria' => 'Arroces',
                'tiempo_preparacion' => '60 minutos',
                'categoria_id' => 43,
                'imagen' => 'images/imagenes-recetas/arroz-al-horno.jpg'
            ],

            [
                'user_id' => $user->id,
                'titulo' => 'Paella de Marisco',
                'ingredientes' => [
                    ['nombre' => 'arroz','cantidad' => 2, 'unidad' => 'tazas'],
                    ['nombre' => 'caldo de pescado', 'cantidad' => 4, 'unidad' => 'tazas'],
                    ['nombre' => 'gambas peladas', 'cantidad' => 200, 'unidad' => 'g'],
                    ['nombre' => 'calamares en rodajas', 'cantidad' => 200, 'unidad' => 'g'],
                    ['nombre' => 'mejillones limpios', 'cantidad' => 200, 'unidad' => 'g'],
                    ['nombre' => 'tomate triturado', 'cantidad' => 1/2, 'unidad' => 'taza'],
                    ['nombre' => 'diente de ajo', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'cebolla', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'pimiento rojo', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'Aceite de oliva', 'cantidad' => 1/2, 'unidad' => 'oz'],
                    ['nombre' => 'pizca de azafrán', 'cantidad' => 1, 'unidad' => 'pizca'],
                    ['nombre' => 'sal', 'cantidad' => 2, 'unidad' => 'pizca'],
                    ['nombre' => 'agua', 'cantidad' => 1000, 'unidad' => 'ml'],
                ],
                'descripcion' => 'En una paellera, calienta un poco de aceite y sofríe la cebolla y el ajo, añade el pimiento y sofríe hasta que esté tierno,incorpora los calamares y fríe durante unos minutos.
                    Añade el tomate triturado y cocina hasta que reduzca, agrega el arroz y sofríe durante un par de minutos,vierte el caldo de pescado caliente y el azafrán. Mezcla bien y cocina durante 10 minutos.
                    Agrega las gambas y los mejillones. Cocina hasta que los mejillones se abran y el arroz esté cocido, aproximadamente 10-15 minutos más, retira del fuego y deja reposar unos minutos antes de servir.',
                'categoria' => 'Arroces',
                'tiempo_preparacion' => '60 minutos',
                'categoria_id' => 43,
                'imagen' => 'images/imagenes-recetas/Paella_marisco.jpg'
            ],
            [
                'user_id' => $user->id,
                'titulo' => 'Arroz caldoso con alcachofas',
                'ingredientes' => [
                    ['nombre' => 'arroz',43, 'cantidad' => 350, 'unidad' => 'g'],
                    ['nombre' => 'alcachofas', 'cantidad' => 3, 'unidad' => 'ud'],
                    ['nombre' => 'puerro', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'caldo de verduras', 'cantidad' => 1, 'unidad' => 'l'],
                    ['nombre' => 'tomate triturado', 'cantidad' => 3, 'unidad' => 'taza'],
                    ['nombre' => 'diente de ajo', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'cebolla', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'pimiento rojo', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'Aceite de oliva', 'cantidad' => 1/2, 'unidad' => 'oz'],
                    ['nombre' => 'pizca de azafrán', 'cantidad' => 1, 'unidad' => 'pizca'],
                    ['nombre' => 'sal', 'cantidad' => 2, 'unidad' => 'pizca'],
                    ['nombre' => 'agua', 'cantidad' => 1000, 'unidad' => 'ml'],
                ],
                'descripcion' => 'Para empezar con la receta de arroz caldoso con alcachofas, primero debes limpiar las alcachofas. Para ello, retira las hojas de fuera hasta llegar a la parte más tierna, el centro. Luego, cortas las puntas.
                 Limpiarlas bien y retira también los tallos. A continuación, corta las alcachofas en cuartos y colócalas en un bol con agua fría y perejil o unas rodajas de limón para que no se pongan oscuras.Pela y pica la cebolla muy pequeñita, el puerro y el diente de ajo.
                 En una cazuela añade un chorro de aceite y, cuando esté caliente, escurre bien las alcachofas e incorpóralas en la cazuela. Deja que se rehoguen unos 5 minutos y, luego, añade el puerro y la cebolla, deja que se pochen los ingredientes.
                 Cuando empiecen a estar pochadas las verduras, añade el diente de ajo picado y rehoga 1 minuto junto con los demás ingredientes. Seguido, añade el tomate triturado natural, remueve y deja unos minutos hasta que observes que el sofrito está listo.
                 Añade el arroz y remueve con los demás ingredientes. Luego, cocina unos minutos con el sofrito.En otro recipiente calienta el caldo de verduras, puedes hacerlo en el microondas. A continuación, cuando esté caliente, añade casi todo el caldo, un poco de sal y
                  el azafrán, remueve y deja a fuego alto 7-8 minutos. Luego, baja a fuego medio hasta que el arroz esté en su punto. Se puede preparar el caldo de verduras en casa o comprarlo ya hecho, también se puede añadir agua en lugar de caldo.
                  Si observas que se evapora mucho el caldo, debes añadir más caldo o agua, según te guste.Cuando observes que casi está listo el arroz caldoso con alcachofas y verduras, debes probarlo y rectificar si hace falta. Deja reposar 5 minutos y sirve enseguida bien caliente.',
                'categoria' => 'Arroces',
                'tiempo_preparacion' => '60 minutos',
                'categoria_id' => 43,
                'imagen' => 'images/imagenes-recetas/arroz_alcachofas.JPG'
            ],
            [
                'user_id' => $user->id,
                'titulo' => 'Tortilla Española',
                'ingredientes' => [
                    ['nombre' => 'huevos', 'cantidad' => 4, 'unidad' => 'ud'],
                    ['nombre' => 'patatas', 'cantidad' => 4, 'unidad' => 'ud'],
                    ['nombre' => 'cebolla', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'Aceite de oliva', 'cantidad' => 1, 'unidad' => 'oz'],
                    ['nombre' => 'sal', 'cantidad' => 2, 'unidad' => 'pizca'],
                    ['nombre' => 'agua', 'cantidad' => 1000, 'unidad' => 'ml'],
                ],
                'descripcion' => 'Una deliciosa tortilla española hecha con huevos, patatas y cebolla. Corta las patatas y la cebolla en rodajas finas, fríelas en aceite de oliva hasta que estén doradas. Bate los huevos y mézclalos con las patatas y la cebolla fritas. Cocina a fuego lento 
                hasta que la tortilla esté cuajada por ambos lados.',
                'categoria' => 'Tapas y Pinchos',
                'tiempo_preparacion' => '30 minutos',
                'categoria_id' => 34,
                'imagen' => 'images/recetas/tortilla_patatas,jpg'
            ],
            [
                'user_id' => $user->id,
                'titulo' => 'Gazpacho Andaluz',
                'ingredientes' => [
                    ['nombre' => 'Tomates maduros', 'cantidad' => 6, 'unidad' => 'ud'],
                    ['nombre' => 'Pimiento verde', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'Pepino', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'Vinagre de jerez', 'cantidad' => 1, 'unidad' => 'taza'],
                    ['nombre' => 'Pan', 'cantidad' => 1, 'unidad' => 'trozo'],
                    ['nombre' => 'cebolla', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'Aceite de oliva', 'cantidad' => 1, 'unidad' => 'oz'],
                    ['nombre' => 'sal', 'cantidad' => 2, 'unidad' => 'pizca'],
                    ['nombre' => 'agua', 'cantidad' => 1000, 'unidad' => 'ml'],
                ],
                'descripcion' => 'El gazpacho andaluz es una sopa fría a base de tomate, pimiento verde, pepino y otros ingredientes 
                frescos. Se sirve bien frío y es perfecto para los días calurosos de verano.',
                'categoria' => 'Sopas y Cremas',
                'tiempo_preparacion' => '15 minutos',
                'categoria_id' => 40,
                'imagen' => 'images/recetas/gazpacho_andaluz.jpg'
            ],
            [
                'user_id' => $user->id,
                'titulo' => ' Pulpo a la Gallega',
                'ingredientes' => [
                    ['nombre' => 'Pulpo', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'Patatas', 'cantidad' => 2, 'unidad' => 'ud'],
                    ['nombre' => 'Pimentón', 'cantidad' => 1, 'unidad' => 'pizca'],
                    ['nombre' => 'Aceite de oliva', 'cantidad' => 1, 'unidad' => 'oz'],
                    ['nombre' => 'sal', 'cantidad' => 2, 'unidad' => 'pizca'],
                ],
                'descripcion' => 'El pulpo a la gallega es un plato tradicional de Galicia que consiste en pulpo cocido y cortado
                 en rodajas, servido sobre una cama de patatas cocidas y aderezado con pimentón, aceite de oliva y sal. Es una delicia 
                 muy popular en toda España.',
                'categoria' => ' Pescados y Mariscos',
                'tiempo_preparacion' => '45 minutos',
                'categoria_id' => 2,
                'imagen' => 'images/recetas/pulpo_gallega.jpg'
            ],
            [
                'user_id' => $user->id,
                'titulo' => ' Crema Catalana',
                'ingredientes' => [
                    ['nombre' => 'Leche', 'cantidad' => 1, 'unidad' => 'l'],
                    ['nombre' => 'Yemas de huevo', 'cantidad' => 4, 'unidad' => 'ud'],
                    ['nombre' => 'Azúcar', 'cantidad' => 1, 'unidad' => 'pizca'],
                    ['nombre' => 'Maizena', 'cantidad' => 1, 'unidad' => 'pizca'],
                    ['nombre' => 'Canela', 'cantidad' => 1, 'unidad' => 'pizca'],
                    ['nombre' => 'Cáscara de limón', 'cantidad' => 1, 'unidad' => 'rodaja'],
                ],
                'descripcion' => 'La crema catalana es un postre tradicional de Cataluña. Se trata de una crema pastelera aromatizada con canela
                 y cáscara de limón, que se carameliza en la superficie para crear una capa crujiente. Es similar a la crema brulée.',
                'categoria' => 'Postres',
                'tiempo_preparacion' => '30 minutos',
                'categoria_id' => 45,
                'imagen' => 'images/recetas/crema_catalana.jpg'
            ],
            [
                'user_id' => $user->id,
                'titulo' => 'Fabada Asturiana',
                'ingredientes' => [
                    ['nombre' => 'Fabes (judías blancas)', 'cantidad' => 1, 'unidad' => 'kg'],
                    ['nombre' => 'Chorizo', 'cantidad' => 200, 'unidad' => 'g'],
                    ['nombre' => 'Morcilla', 'cantidad' => 100, 'unidad' => 'g'],
                    ['nombre' => 'Tocino', 'cantidad' => 100, 'unidad' => 'g'],
                    ['nombre' => 'Jamón', 'cantidad' => 100, 'unidad' => 'g'],
                    ['nombre' => 'Azafrán', 'cantidad' => 1, 'unidad' => 'pizca'],
                    ['nombre' => 'Aceite de oliva', 'cantidad' => 1, 'unidad' => 'taza'],
                    ['nombre' => 'Cebolla', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'Ajo', 'cantidad' => 1, 'unidad' => 'ud'],
                    ['nombre' => 'Pimentón', 'cantidad' => 1, 'unidad' => 'pizca'],
                    ['nombre' => 'Sal', 'cantidad' => 1, 'unidad' => 'pizca'],
                ],
                'descripcion' => 'La fabada asturiana es un plato típico de Asturias que se prepara con fabes (judías blancas) y embutidos como chorizo,
                 morcilla y tocino. Es un plato abundante y sabroso, perfecto para el invierno.',
                'categoria' => 'Legumbres,Guisos y Cocidos',
                'tiempo_preparacion' => '120 minutos',
                'categoria_id' => 35, 1,
                'imagen' => 'images/recetas/fabada-asturiana.jpg'
            ],
            [
                'user_id' => $user->id,
                'titulo' => 'Ensalada César',
                'ingredientes' => [
                    ['nombre' => 'Lechuga romana', 'cantidad' => 300, 'unidad' => 'g'],
                    ['nombre' => 'Crutones', 'cantidad' => 50, 'unidad' => 'g'],
                    ['nombre' => 'Pollo', 'cantidad' => 100, 'unidad' => 'g'],
                    ['nombre' => 'Parmesano', 'cantidad' => 50, 'unidad' => 'g'],
                    ['nombre' => 'Salsa César', 'cantidad' => 50, 'unidad' => 'g'],
                ],
                'descripcion' => 'La ensalada César es una ensalada clásica que combina lechuga romana fresca con crutones crujientes, 
                pollo a la parrilla, parmesano rallado y una deliciosa salsa César. Es una opción ligera y deliciosa.',
                'categoria' => 'Comida',
                'tiempo_preparacion' => ' 20 minutos',
                'categoria_id' => 31,
                'imagen' => 'images/recetas/ensalada_cesar.jpg'
            ],
            [
                'user_id' => $user->id,
                'titulo' => 'Tarta de Manzana',
                'ingredientes' => [
                    ['nombre' => 'Manzanas', 'cantidad' => 300, 'unidad' => 'g'],
                    ['nombre' => 'Masa quebrada', 'cantidad' => 50, 'unidad' => 'g'],
                    ['nombre' => 'Azúcar', 'cantidad' => 10, 'unidad' => 'g'],
                    ['nombre' => 'Canela', 'cantidad' => 1, 'unidad' => 'pizca'],
                    ['nombre' => 'Limón', 'cantidad' => 1, 'unidad' => 'rodaja'],
                ],
                'descripcion' => 'La tarta de manzana es un postre clásico que combina manzanas cortadas en láminas con una base de masa
                 quebrada y un toque de canela. Es perfecta para acompañar con helado o crema batida.',
                'categoria' => 'Postres',
                'tiempo_preparacion' => '45 minutos',
                'categoria_id' => 45,
                'imagen' => 'images/recetas/tarta_manzana.jpg'
            ],

            [
                'user_id' => $user->id,
                'titulo' => 'Torrijas de leche',
                'ingredientes' => [
                    ['nombre' => 'Pan para torrijas en rebanadas', 'cantidad' => 20, 'unidad' => 'g'],
                    ['nombre' => 'Leche', 'cantidad' => 1, 'unidad' => '1'],
                    ['nombre' => 'Azúcar', 'cantidad' => 100, 'unidad' => 'g'],
                    ['nombre' => 'Canela en rama', 'cantidad' => 1, 'unidad' => 'pizca'],
                    ['nombre' => 'Aceite de oliva', 'cantidad' => 1, 'unidad' => 'l'],
                    ['nombre' => 'Huevos', 'cantidad' => 2, 'unidad' => 'ud'],
                    ['nombre' => 'Azúcar para rebozar', 'cantidad' => 100, 'unidad' => 'g'],
                    ['nombre' => 'Canela molida para rebozar', 'cantidad' => 100, 'unidad' => 'g'],
                    ['nombre' => 'Ralladura de limón', 'cantidad' => 100, 'unidad' => 'g'],
                ],
                'descripcion' => 'En un cacito ponemos el litro de leche, el azúcar, la rama de canela 
                y la piel del limón (sin nada de la parte blanca). Calentamos y cuando comience a hervir
                 lo retiramos del fuego, tapamos y esperamos a que se enfríe antes de empapar las rebanadas de pan ya que si no se reblandecen demasiado',
                'categoria' => 'Postres',
                'tiempo_preparacion' => '35 minutos',
                'categoria_id' => 45,
                'imagen' => 'images/recetas/torrijas.png'
            ],
        ];

        /*foreach ($recetas as $receta) {
            // Verifica si el ingrediente ya existe en la base de datos
            $existente = Receta::where('titulo', $receta['titulo'])->first();

            if (!$existente) {
                // Crea un nuevo ingrediente en la base de datos
                Receta::create($receta);
            }
        }*/
        foreach ($recetas as $receta) {
            // Verifica si la receta ya existe en la base de datos
            $existente = Receta::where('titulo', $receta['titulo'])->first();

            if (!$existente) {
                // Crea una nueva receta en la base de datos
                $nuevaReceta = new Receta([
                    'user_id' => $receta['user_id'],
                    'titulo' => $receta['titulo'],
                    'descripcion' => $receta['descripcion'],
                    'categoria' => $receta['categoria'],
                    'tiempo_preparacion' => $receta['tiempo_preparacion'],
                    'categoria_id' => $receta['categoria_id'],
                    'imagen' => $receta['imagen'],
                ]);

                $nuevaReceta->save();

                // Asociar ingredientes a la receta
                foreach ($receta['ingredientes'] as $ingrediente) {
                    $ingredienteModel = Ingrediente::firstOrCreate(['nombre' => $ingrediente['nombre']]);
                    $nuevaReceta->ingredientes()->attach($ingredienteModel->id, [
                        'cantidad' => $ingrediente['cantidad'],
                        'unidad' => $ingrediente['unidad'],
                    ]);
                }
            }
        }
    }
}
