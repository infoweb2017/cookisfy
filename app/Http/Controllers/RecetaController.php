<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // 1. Recuperar los datos
        // Aquí puedes recuperar tus recetas de la base de datos, por ejemplo:

       $recetas = Receta::all(); // Suponiendo que tienes un modelo 'Receta'
       // 2. Pasar los datos a la vista
      // Envías los datos recuperados a tu vista (archivo Blade)
        return view('/recetas/receta', compact('receta'));
    }
 
    /**
     * Muestra el formulario para crear un nueva receta
     */
    public function create()
    {
         // Retorna una vista que muestra el formulario para crear una nueva receta
          return view('recetas.create');
    }

    /**
     *Almacena un recurso recién creado..
     */
    public function store(Request $request)
    {// Validación de datos del formulario (puedes personalizar las reglas de validación)
    $request->validate([
        'titulo' => 'required|string|max:255',
        'ingredientes' => 'required|string',
        'instrucciones' => 'required|string',
        'categoria_id' => 'required|exists:categorias,id',
        'tiempo_preparacion' => 'required|integer',
    ]);

    // Crear una nueva receta con los datos del formulario
    $receta = new Receta();
    $receta->user_id = auth()->user()->id; // Asignar el ID del usuario actual
    $receta->titulo = $request->input('titulo');
    $receta->ingredientes = $request->input('ingredientes');
    $receta->instrucciones = $request->input('instrucciones');
    $receta->categoria_id = $request->input('categoria_id');
    $receta->tiempo_preparacion = $request->input('tiempo_preparacion');

    // Guardar la receta en la base de datos
    $receta->save();
  

// Redireccionar a la vista de detalle de la receta recién creada
    return redirect()->route('recetas.show', $receta->id);
    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show(Receta $receta)
    {
        // Obtener la receta por su ID
    $receta = Receta::findOrFail($id);
    
        // Retornar una vista que muestra los detalles de la receta
        return view('recetas.show', compact('receta'));
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     */
    public function edit(Receta $receta)
    {
        // Obtener la receta por su ID
    $receta = Receta::findOrFail($id);

    // Retornar una vista que muestra el formulario para editar la receta
    return view('recetas.edit', compact('receta'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(Request $request, Receta $receta)
    {
        // Validación de datos del formulario (puedes personalizar las reglas de validación)
    $request->validate([
        'titulo' => 'required|string|max:255',
        'ingredientes' => 'required|string',
        'instrucciones' => 'required|string',
        'categoria_id' => 'required|exists:categorias,id',
        'tiempo_preparacion' => 'required|integer',
    ]);

    // Obtener la receta por su ID
    
    
$receta = Receta::findOrFail($id);

    // Actualizar los datos de la receta con los datos del formulario
    $receta->titulo = $request->input('titulo');
    $receta->ingredientes = $request->input('ingredientes');
    $receta->instrucciones = $request->input('instrucciones');
    $receta->categoria_id = $request->input('categoria_id');
    $receta->tiempo_preparacion = $request->input('tiempo_preparacion');

    

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
        //Obtener la receta por su ID
    $receta = Receta::findOrFail($id);

    // Eliminar la receta de la base de datos
    $receta->delete();

    //Redireccionar a una vista que muestre un mensaje de confirmación o a la lista de recetas
    
return redirect()->route('recetas.index');
    }
}
