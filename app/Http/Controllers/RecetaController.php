<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Ingrediente;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Mostrará solo las recetas del usuario actual
 */
class RecetaController extends Controller
{
    public function index()
    {
        $recetas = Receta::where('user_id', auth()->id())->get();
        //$recetas = Receta::all(); // Obtiene las recetas del usuario autenticado
        return view('recetas.index', compact('recetas')); // Pasa las recetas a la vista
    }

    //Método que mostrará todas las recetas
    public function galeria()
    {
        $recetas = Receta::all(); // 10 recetas por página, ajusta este número según tus necesidades
        return view('recetas.galeria', compact('recetas')); // Aseguró de que la vista se llama 'galeria.blade.php'
    }

    /**
     * Muestra el formulario para crear un nueva receta
     */
    public function create()
    {
        $categorias = Categoria::all(); // Obtiene todas las categorías 
        $ingredientes = Ingrediente::all(); // Obtiene todos los ingredientes 
        // Retorna una vista que muestra el formulario para crear una nueva receta
        return view('recetas.create', compact('categorias', 'ingredientes'));
    }
    /**
     *Almacena un recurso recién creado..
     */
    public function store(Request $request)
    {
        //dd($request->all(), $request->file('image'));

        // Valida los datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'ingredientes' => 'required|array',
            'ingredientes.*' => 'exists:ingredientes,id',
            'descripcion' => 'required|string',
            'tiempo_preparacion' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Valida la imagen
            'pasos' => 'required|array', // Valida los pasos
            'pasos.*' => 'required|string', // Valida cada paso individualmente
        ]);

        // Obtiene la ruta de la imagen subida
        $imagenPath = $request->file('image')->store('public\build\assets\imagenes-recetas');

        // Extrae solo el nombre del archivo de la ruta
        $nombreImagen = basename($imagenPath);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Crear la receta usando la relación
        if ($user) {
            //dd($user, $user->recetas()); /Depurar error
            $receta = $user->recetas->create([
                // Crea una nueva instancia de Receta con los datos del formulario
                // $receta = new Receta([
                'user_id' => auth()->id(), // sar el ID del usuario autenticado
                'titulo' => $request->input('titulo'),
                'ingredientes' => $request->input('ingrediente'),
                'descripcion' => $request->input('descripcion'),
                'categoria' => $request->input('categoria_id'),
                'tiempo_preparacion' => $request->input('tiempo_preparacion'),
                'categoria_id' => $request->input('categoria_id'),
                'imagen' => $nombreImagen, // Asigna el nombre de la imagen
            ]);
        } {
        }


        // Sube la imagen y almacena la ruta en la base de datos
        if ($request->hasFile('image')) {
            $imagen = $request->file('image');
            $imagenNombre = time() . '_' . $imagen->getClientOriginalName();
            $imagen->storeAs('public/assets/imagenes-recetas', $imagenNombre);
            $receta->imagen = 'public/assets/imagenes-recetas' . $imagenNombre;
        } else {
            $imagenNombre = null; // No se cargó una imagen

        }

        // Guarda la receta en la base de datos
        $receta->save();

        // Asocia los ingredientes a la receta (debes obtener los ingredientes seleccionados en el formulario)
        $ingredientes = $request->input('ingredientes');
        /* foreach ($ingredientes as $ingrediente) {
           // dd($ingredientes);
            $receta->ingredientes()->attach($ingredienteId, [
                'cantidad_ingredientes' => $ingrediente['cantidad'],
                'unidad' => $ingrediente['unidad'],
            ]);
        }*/
        foreach ($ingredientes as $ingredienteId => $datosIngrediente) {
            if (isset($datosIngrediente['id'])) {
                $receta->ingredientes()->attach($datosIngrediente['id'], [
                    'cantidad_ingredientes' => $datosIngrediente['cantidad'],
                    'unidad' => $datosIngrediente['unidad'],
                ]);
            }
        }

        // Asocia las categorías a la receta
        //$receta->categoria()->attach($request->input('categoria_id'));
        $receta->categoria_id = $request->input('categoria_id');
        $receta->save();

        // Guardar los pasos de la receta
        foreach ($request->input('pasos') as $orden => $descripcion) {
            $receta->pasos()->create([
                'descripcion' => $descripcion,
                'solicitar' => $orden + 1, // Asumiendo que 'solicitar' es el orden del paso
            ]);
        }

        // Redireccionar a una vista de éxito o haz lo que desees después de crear la receta
        return redirect()->route('recetas.index')->with('success', 'Receta creada exitosamente');
    }

    /**
     * Mostrar recetas
     */
    public function show(Receta $receta)
    {
        // Obtener la receta por su ID
        //$receta = Receta::findOrFail($id);

        // Retornar una vista que muestra los detalles de la receta
        return view('recetas.receta', compact('receta')); // Carga relaciones adicionales si es necesario, por ejemplo, comentarios y reseñas
    }

    /**
     * Mostrar el formulario para editar recetas.
     */
    public function edit(Receta $recetas)
    {
        if (Auth::id() !== $recetas->user_id) {
            return redirect()->route('recetas.index')->with('error', 'No autorizado');
        }
        $categorias = Categoria::all();
        // Retornar una vista que muestra el formulario para editar la receta
        return view('recetas.edit', compact('receta'));
        //return view('recetas.edit' , ['recetas' => $recetas]);
    }

    /**
     * Actualiza el recurso recetas.
     */
    public function update(Request $request, Receta $receta)
    {
        // Validación de datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'ingredientes' => 'required|string',
            'instrucciones' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'tiempo_preparacion' => 'required|integer',
            'pasos' => 'required|array',
            'pasos.*.descripcion' => 'required|string',
        ]);

        // Obtener la receta por su ID
        //$receta = Receta::findOrFail($id);

        // Actualizar los datos de la receta con los datos del formulario
        $receta->titulo = $request->input('titulo');
        $receta->ingredientes = $request->input('ingredientes');
        $receta->instrucciones = $request->input('instrucciones');
        $receta->categoria_id = $request->input('categoria_id');
        $receta->tiempo_preparacion = $request->input('tiempo_preparacion');

        // Actualizar o añadir los pasos de la receta
        $pasosIds = [];
        foreach ($request->input('pasos') as $orden => $descripcion) {
            $paso = $receta->pasosRecetas()->updateOrCreate(
                ['solicitar' => $orden + 1], // Clave para identificar el paso (orden)
                ['pasos' => $descripcion] // Datos a actualizar
            );
            $pasosIds[] = $paso->id;
        }

        // Eliminar los pasos que ya no existen
        $receta->pasosRecetas()->whereNotIn('id', $pasosIds)->delete();

        // Guardar la receta actualizada en la base de datos
        $receta->save();

        // Redireccionar a la vista de detalle de la receta actualizada
        return redirect()->route('recetas.show', $receta->id);
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(Receta $receta)
    {
        // Verificar que el usuario autenticado es el dueño de la receta
        if (Auth::id() !== $receta->user_id) {
            // Redirigir si el usuario no tiene permiso para eliminar la receta
            return redirect()->route('recetas.index')->with('error', 'No tienes permiso para realizar esta acción');
        }

        $receta->delete(); // Elimina la receta
        return redirect()->route('recetas.index')->with('success', 'Receta eliminada con éxito');
    }

    public function saberMas()
    {
        // Aquí puedes recuperar datos de recetas u otros contenidos
        // y pasarlos a una vista para mostrarlos.

        return view('banner.saber-mas');
    }

    //buscador de recetas de cocina ira tanto en el nav-user como nav-home
    public function buscar(Request $request)
    {
        $query = $request->input('query'); //name del input
        $recetas = collect(); // Inicializa una colección vacía

        // Verificar si se ha proporcionado un término de búsqueda
        if (!empty($query)) {
            // Buscar recetas que coincidan con el término de búsqueda
            $recetas = Receta::where('titulo', 'LIKE', '%' . $query . '%')
                ->orWhere('descripcion', 'LIKE', '%' . $query . '%')
                ->get();
        }

        $artExternos = [
            [
                'titulo' => 'Atascaburras manchego',
                'url' => 'https://entrecarbonypucheros.com/atascaburras-manchego/',
                'resumen' => 'Esta receta que vamos a preparar hoy , es un plato con raíces manchegas . 
                La tradición marca su consumo generalmente en invierno , pero como dice el refrán ,
                que cada maestrillo tiene su librillo , si lo hacemos en dias de calor y lo introducimos
                en el nevera pasa a ser una receta refrescante y muy adecuada para  el verano .'
            ],
            [
                'titulo' => '12 cenas sencillas y saludables que te ayudarán a descansar mejor.',
                'url' => 'https://www.aprendiendoacomersano.com/12-cenas-saludables-que-te-ayudaran-a-descansar-mejor/',
                'resumen' => 'Llegas tarde a casa, agotada/o y sin ideas sobre que cenar hoy. Abres la nevera y buscas inspiración
                 pero no la encuentras.  Descubre 12 cenas sencillas y saludables que te ayudarán a descansar mejor.'
            ],
            [
                'titulo' => 'Alimentación saludable',
                'url' => 'https://www.infisport.com/blog/alimentacion-saludable',
                'resumen' => 'Probablemente, mas de un lector de este blog haya querido variar su peso en alguna ocasión con distintos
                 objetivos. Sin embargo, tenemos que preguntarnos si estamos siguiendo hábitos nutricionales saludables en el día a día.'
            ],
            [
                'titulo' => 'RISOTTO INTEGRAL DE AJO NEGRO',
                'url' => 'https://blog.freefood.es/recetas/risotto-de-ajo-negro/',
                'resumen' => ' risotto de ajo negro es una receta deliciosa y original que combina el sabor intenso del ajo negro con la cremosidad d
                el risotto. El ajo negro es un ajo fermentado que ha sido sometido a un proceso de maduración natural. Este proceso le confiere un 
                sabor dulce y ahumado que es muy diferente al del ajo fresco. El sabor del ajo negro recuerda mucho al sabor del regaliz negro.'
            ],
            [
                'titulo' => 'Vida y hábitos saludables',
                'url' => 'https://cocinandoelcambio.com/category/vida-y-habitos-saludables/',
                'resumen' => 'Cómo cambiar de hábitos, mejorarlos y mantenerlos en el tiempo Hacía mucho tiempo que no compartía una entrevista en el 
                blog y por eso hoy te traigo una super especial con alguien que a mí me inspira un montón. '
            ],
            [
                'titulo' => 'MARMITAKO BAJO EN CARBOHIDRATOS',
                'url' => 'https://blog.freefood.es/recetas/marmitako-bajo-en-carbohidratos/',
                'resumen' => 'Vas a disfrutar esta receta de pescado azul al mismo tiempo que cuidar tu dieta. Porque este marmitako de atún es bajo en 
                carbohidratos. Reducimos la cantidad de patata que suele llevar este plato, sustituyendo esa parte de patata por calabacín y colinabo. '
            ],

        ];


        return view('busquedas.buscar', compact('recetas', 'query', 'artExternos'));
    }
}
