<?php

namespace App\Http\Controllers;

use App\Models\comentario;
use Illuminate\Http\Request;
use app\Models\Receta;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    // Método para mostrar el formulario de creación de comentarios
    public function create(Receta $receta)
    {
        return view('comentarios.create', compact('receta'));
    }

    // Método para almacenar el comentario en la base de datos
    public function store(Request $request, Receta $recetaId)
    {
        // Validación del formulario (personaliza según tus necesidades)
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'receta_id' => 'required|exists:recetas,id',
        ]);

        // Crea el comentario asociado a la receta y al usuario autenticado
        $receta = Receta::findOrFail($recetaId);
        $receta->comentarios()->create([
            'user_id' => auth()->id(), // ID del usuario autenticado
            'descripcion' => $request->descripcion, 
            'receta_id' => $request->receta_id,
        ]);
        //return redirect()->route('recetas.show', $receta->id)->with('success', 'Comentario actualizado.');
        return back()->with('success', 'Comentario agregado.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        // Mostrar la vista de detalle de un comentario
        return view('recetas.inicio', compact('comentario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        // Mostrar el formulario editar
        return view('comentarios.edit', compact('comentario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        // Validación del formulario de edición 
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        // Actualizar el comentario
        $comentario->update([
            'descripcion' => $request->descripcion, // Actualiza el texto del comentario
        ]);

        return redirect()->route('recetas.inicio', $comentario->id)->with('success', 'Comentario actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        $comentario->delete();

        return back()->with('success', 'Comentario eliminado.');
    }
}
