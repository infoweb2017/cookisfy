<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\buscar;
use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Ingrediente;
use App\Models\Ofertas;
use App\Models\Receta;
use App\Models\User;
use Illuminate\Http\Request;

class BuscarController extends Controller
{

    //buscador de recetas de cocina ira tanto en el nav-user como nav-home
    public function buscar(Request $request)
    {
        $query = $request->input('query');
        $recetas = Receta::where('titulo', 'LIKE', '%' . $query . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $query . '%')
            ->get();

        // Búsqueda en categorías
        $categorias = Categoria::where('nombre', 'LIKE', '%' . $query . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $query . '%')
            ->get();

        // Búsqueda en ingredientes
        $ingredientes = Ingrediente::where('nombre', 'LIKE', '%' . $query . '%')
            ->get();

        // Búsqueda en artículos externos
        $artExternos = $this->obtenerArticulosExternos(); 

        // Búsqueda en eventos (suponiendo que tengas un modelo de eventos)
        $eventos = Evento::where('titulo', 'LIKE', '%' . $query . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $query . '%')
            ->get();

        // Búsqueda en ofertas 
        $ofertas = Ofertas::where('titulo', 'LIKE', '%' . $query . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $query . '%')
            ->get();

        // Búsqueda en ofertas
        $articulos = Articulo::where('titulo', 'LIKE', '%' . $query . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $query . '%')
            ->get();

        // Búsqueda en usuarios
        $usuarios = User::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('email', 'LIKE', '%' . $query . '%')
            ->get();

        return view('busquedas.buscar', compact('recetas', 'categorias', 'ingredientes', 'artExternos', 'eventos', 'ofertas','articulos', 'usuarios', 'query'));
    }

    private function obtenerArticulosExternos()
    {
        return [

            [
                'titulo' => 'Atascaburras manchego',
                'url' => 'https://entrecarbonypucheros.com/atascaburras-manchego/',
                'resumen' => 'Esta receta que vamos a preparar hoy , es un plato con raíces manchegas . 
                    La tradición marca su consumo generalmente en invierno , pero como dice el refrán ,
                    que cada maestrillo tiene su librillo , si lo hacemos en dias de calor y lo introducimos
                    en el nevera pasa a ser una receta refrescante y muy adecuada para  el verano .',
                'imagen' => 'images/recetas/atrascaburras_manchego.jpeg'
            ],
            [
                'titulo' => '12 cenas sencillas y saludables.',
                'url' => 'https://www.aprendiendoacomersano.com/12-cenas-saludables-que-te-ayudaran-a-descansar-mejor/',
                'resumen' => 'Llegas tarde a casa, agotada/o y sin ideas sobre que cenar hoy. Abres la nevera y buscas inspiración
                     pero no la encuentras.  Descubre 12 cenas sencillas y saludables que te ayudarán a descansar mejor.',
                'imagen' => 'images/imagenes/blogs-de-cocina.webp'
            ],
            [
                'titulo' => 'Alimentación saludable',
                'url' => 'https://www.infisport.com/blog/alimentacion-saludable',
                'resumen' => 'Probablemente, mas de un lector de este blog haya querido variar su peso en alguna ocasión con distintos
                     objetivos. Sin embargo, tenemos que preguntarnos si estamos siguiendo hábitos nutricionales saludables en el día a día.',
                'imagen' => 'images/recetas/alimentacion_saludable.jpg'
            ],
            [
                'titulo' => 'Risotto integral de ajo negro',
                'url' => 'https://blog.freefood.es/recetas/risotto-de-ajo-negro/',
                'resumen' => ' risotto de ajo negro es una receta deliciosa y original que combina el sabor intenso del ajo negro con la cremosidad d
                    el risotto. El ajo negro es un ajo fermentado que ha sido sometido a un proceso de maduración natural. Este proceso le confiere un 
                    sabor dulce y ahumado que es muy diferente al del ajo fresco. El sabor del ajo negro recuerda mucho al sabor del regaliz negro.',
                'imagen' => 'images/recetas/risotto-ajo-negro.jpeg'
            ],
            [
                'titulo' => 'Vida y hábitos saludables',
                'url' => 'https://cocinandoelcambio.com/category/vida-y-habitos-saludables/',
                'resumen' => 'Cómo cambiar de hábitos, mejorarlos y mantenerlos en el tiempo Hacía mucho tiempo que no compartía una entrevista en el 
                    blog y por eso hoy te traigo una super especial con alguien que a mí me inspira un montón. ',
                'imagen' => 'images/imagenes/pexels-cottonbro-studio-4253320.jpg'

            ],
            [
                'titulo' => 'Marmitako bajo en carbohidrato',
                'url' => 'https://blog.freefood.es/recetas/marmitako-bajo-en-carbohidratos/',
                'resumen' => 'Vas a disfrutar esta receta de pescado azul al mismo tiempo que cuidar tu dieta. Porque este marmitako de atún es bajo en 
                    carbohidratos. Reducimos la cantidad de patata que suele llevar este plato, sustituyendo esa parte de patata por calabacín y colinabo. ',
                'imagen' => 'images/recetas/marmitako-br.jpeg'
            ],

        ];
    }
}
