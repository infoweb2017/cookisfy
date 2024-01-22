<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\buscar;
use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Ingrediente;
use App\Models\Preparacion_paso;
use App\Models\Receta;
use App\Models\User;
use Exception;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

/**
 * Mostrará solo las recetas del usuario actual
 */
class RecetaController extends Controller
{
    public function inicio()
    {
        $recetas = Receta::where('user_id', auth()->id())->get();
        //$recetas = Receta::all(); // Obtiene las recetas del usuario autenticado
        return view('recetas.inicio', compact('recetas')); // Pasa las recetas a la vista
    }
    //Solo mostrara 10 receta, para page: welcome
    public function mostrarRecetasYArticulos()
    {
        $comentario = Comentario::where('publico', true)->get();
        $recetas = Receta::take(10)->get(); // Obtener las primeras 10 recetas
        $articulos = Articulo::all();

        return view('welcome', compact('recetas', 'articulos', 'comentario'));
    }
    //Método que mostrará todas las recetas
    public function galeria()
    {
        //cada receta tiene un campo 'imagen'
        //$imagenes = Receta::pluck('imagen');
        // Pasar las imágenes a la vista
        //return view('recetas.galeria', ['imagenes' => $imagenes]);
        $recetas = Receta::all();
        $comentario = Comentario::all();
        return view('recetas.galeria', compact('recetas', 'comentario'));
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
        // Asigna el valor predeterminado si no se proporciona un valor
        if (!$request->has('categoria_id')) {
            $request->merge(['categoria_id' => 1]); // Asigna el ID de la categoría predeterminada
        }
        // Validación de datos
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'categoria_id' => 'required|max:255',
            'tiempo_preparacion' => 'nullable|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Sube la imagen y almacena la ruta en la base de datos (si se ha subido una imagen)
        $nombreImagen = null;
        if ($request->hasFile('imagen')) {
            $nombreImagen = $request->file('imagen')->store('images/recetas', 'public');
        }

        // Obtener el usuario autenticado
        $user = User::find(Auth::id());

        // Crear una nueva instancia de Receta y asignar valores
        $receta = new Receta([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'categoria_id' => $request->categoria_id, // Asegúrate de que coincida con el campo en el formulario
            'tiempo_preparacion' => $request->tiempo_preparacion,
            'imagen' => $nombreImagen, // Asigna el nombre de la imagen
        ]);

        // Asignar el usuario autenticado como autor de la receta
        $receta->user_id = $user->id;

        $receta->save(); // Guardar la receta

        // Asociar ingredientes a la receta
        foreach ($request->input('ingredientes', []) as $dataIngrediente) {
            if (!empty($dataIngrediente['id']) && !empty($dataIngrediente['cantidad']) && !empty($dataIngrediente['unidad'])) {
                $receta->ingredientes()->attach($dataIngrediente['id'], [
                    'cantidad' => $dataIngrediente['cantidad'],
                    'unidad' => $dataIngrediente['unidad']
                ]);
            }
        }

        // Procesar y guardar los pasos de la receta
        foreach ($request->input('pasos', []) as $orden => $descripcionPaso) {
            if (trim($descripcionPaso) != '') {
                Preparacion_paso::create([
                    'receta_id' => $receta->id,
                    'pasos' => $descripcionPaso,
                    'solicitar' => $orden,
                ]);
            }
        }

        // Guardar la receta en la base de datos
        $receta->save();

        // Redirigir al usuario a la página de detalles de la receta recién creada
        return redirect()->route('recetas.show', ['receta' => $receta->id])->with('success', 'Receta creada exitosamente');
    }


    /**
     * Mostrar recetas
     */
    public function show(Receta $receta)
    {
        // Obtener otras recetas del mismo usuario, excluyendo la receta actual
        $otrasRecetas = Receta::where('user_id', $receta->user_id)
            ->where('id', '!=', $receta->id)
            ->get();

        // Retornar una vista que muestra los detalles de la receta
        return view('recetas.receta', compact('receta', 'otrasRecetas')); // Carga relaciones adicionales si es necesario, por ejemplo, comentarios y reseñas
    }

    /**
     * Mostrar el formulario para editar recetas.
     */
    public function edit(Receta $receta)
    {
        // Verificar si el usuario está autenticado y tiene permiso
        if (auth()->user()->id !== $receta->user_id) {
            return redirect()->route('recetas.inicio')->with('error', 'No estás autorizado para editar esta receta.');
        }
        // Obtén las categorías disponibles y pásalas a la vista
        $categorias = Categoria::all();
        $todosIngredientes = Ingrediente::all();
        // Retornar una vista que muestra el formulario para editar la receta
        return view('recetas.edit', compact('receta', 'categorias', 'todosIngredientes'));
    }

    /**
     * Actualiza el recurso recetas.
     */
    public function update(Request $request, Receta $receta)
    {
        // Verificar si el usuario está autenticado y tiene permiso
        if (auth()->user()->id !== $receta->user_id) {
            return redirect()->route('recetas.inicio')->with('error', 'No estás autorizado para editar esta receta.');
        }
        // Validación de datos
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'categoria_id' => 'required|max:255',
            'tiempo_preparacion' => 'nullable|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Actualizar la receta
        /*$receta->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'categoria_id' => $request->categoria_id,
            'tiempo_preparacion' => $request->tiempo_preparacion,
        ]);*/

        $receta->update($request->only(['titulo', 'descripcion', 'categoria_id', 'tiempo_preparacion']));

        // Manejar la actualización de la imagen si se proporciona una nueva

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($receta->imagen) {
                Storage::disk('public')->delete($receta->imagen);
            }

            // Almacenar la nueva imagen
            $nombreImagen = $request->file('imagen')->store('images/recetas', 'public');
            $receta->update(['imagen' => $nombreImagen]);
        }


        // Actualizar los pasos de la receta
        foreach ($request->input('pasos', []) as $orden => $descripcionPaso) {
            if (!is_null($orden) && !empty($descripcionPaso)) {
                $paso = $receta->pasos()->where('solicitar', $orden)->first();

                if ($paso) {
                    // Actualizar el paso existente
                    $paso->update(['pasos' => $descripcionPaso]);
                } else {
                    // Crear un nuevo paso si no existe
                    $receta->pasos()->create([
                        'solicitar' => $orden,
                        'pasos' => $descripcionPaso,
                    ]);
                }
            }
        }

        // Actualizar ingredientes
        $ingredientesData = [];
        foreach ($request->input('ingredientes', []) as $dataIngrediente) {
            // Verifica si 'cantidad' está definido en $dataIngrediente y no es null
            if (isset($dataIngrediente['cantidad']) && !is_null($dataIngrediente['cantidad'])) {
                // Verifica si 'unidad' está definido en $dataIngrediente
                if (isset($dataIngrediente['unidad'])) {
                    DB::table('receta_ingrediente')
                        ->where('receta_id', $receta->id)
                        ->where('ingrediente_id', $dataIngrediente['id'])
                        ->update([
                            'cantidad' => $dataIngrediente['cantidad'],
                            'unidad' => $dataIngrediente['unidad'],
                        ]);
                    $ingredientesData[$dataIngrediente['id']] = [
                        'cantidad' => $dataIngrediente['cantidad'],
                        'unidad' => $dataIngrediente['unidad'],
                    ];
                }
            }
        }
        $receta->ingredientes()->sync($ingredientesData);
        $receta->save(); // Guardar la receta en la base de datos

        // Redireccionar a la vista de detalle de la receta actualizada
        return redirect()->route('recetas.show', $receta->id)->with('success', 'Receta actualizada exitosamente');
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(Receta $receta)
    {
        // Verificar si el usuario está autenticado y tiene permiso
        if (auth()->user()->id !== $receta->user_id) {
            return redirect()->route('recetas.inicio')->with('error', 'No estás autorizado para eliminar esta receta.');
        }

        if ($receta->imagen) {
            Storage::delete('images/recetas' . $receta->imagen);
        }
        $receta->delete(); // Elimina la receta
        return redirect()->route('recetas.inicio')->with('success', 'Receta eliminada con éxito');
    }

    public function saberMas()
    {
        // Aquí puedes recuperar datos de recetas u otros contenidos
        // y pasarlos a una vista para mostrarlos.

        return view('banner.saber-mas');
    }
}
