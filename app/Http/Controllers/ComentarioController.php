<?php

namespace App\Http\Controllers;

use App\Models\comentario;
use Illuminate\Http\Request;

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
    public function store(Request $request, Receta $receta)
    {
        // Validación del formulario (personaliza según tus necesidades)
        $request->validate([
            'comentario' => 'required|string|max:255',
        ]);

        // Crea el comentario asociado a la receta y al usuario autenticado
        Comentario::create([
            'user_id' => auth()->user()->id,
            'receta_id' => $receta->id,
            'comentario' => $request->input('comentario'),
        ]);

        
  
return redirect()->route('recetas.show', $receta->id)->with('success', 'Comentario enviado con éxito.');
    }
    /**
     * Display the specified resource.
     */
    public function show(comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comentario $comentario)
    {
        //
    }
}
