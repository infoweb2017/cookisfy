<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\Receta;
use App\Models\User;

class ComentarioController extends Controller
{
    public function listComentarios(Request $request)
    {
        $comentarios = Comentario::with('receta', 'user')
            ->when($request->has('receta'), function ($query) use ($request) {
                $query->whereHas('receta', function ($subquery) use ($request) {
                    $subquery->where('nombre', 'like', '%' . $request->input('receta') . '%');
                });
            })
            ->when($request->has('usuario'), function ($query) use ($request) {
                $query->whereHas('user', function ($subquery) use ($request) {
                    $subquery->where('name', 'like', '%' . $request->input('usuario') . '%');
                });
            })
            ->get();

        return view('admin.comentarios.lista', compact('comentarios'));
    }

    // Método para mostrar el formulario de creación de comentarios
    public function create(Receta $receta)
    {
    }

    // Método para almacenar el comentario en la base de datos
    public function store(Request $request, $recetaId)
    {
        // Validación del formulario (personaliza según tus necesidades)
        $request->validate([
            //'user_id' => auth()->id(),
            'descripcion' => 'required|string|max:255',
            //'receta_id' => 'required|exists:recetas,id',
        ]);

        // Crea el comentario asociado a la receta y al usuario autenticado
        $receta = Receta::findOrFail($recetaId);

        Comentario::create([
            'user_id' => auth()->id(),
            'receta_id' => $receta->id,
            'descripcion' => $request->descripcion,
        ]);

        if (auth()->User()->isAdmin) {
            // Usuario administrador
            return redirect()->route('admin.comentarios')->with('success', 'Comentario actualizado.');
        } else {
            // Usuario normal
            return redirect()->route('recetas.show', $receta->id)->with('success', 'Comentario actualizado.');
        }

        // return back()->with('success', 'Comentario agregado.');
        //return view('recetas.inicio', ['recetaId' => $recetaId]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Receta $receta)
    {
        $receta->load('comentarios');
        // Mostrar la vista de detalle de un comentario
        return view('recetas.inicio', compact('receta'));
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
        // Verificar si el usuario autenticado es el propietario del comentario
        if (auth()->check() && $comentario->user_id == auth()->user()->id) {
            // Lógica para actualizar el comentario
            $comentario->update([
                'descripcion' => $request->descripcion,
            ]);
            // Redirigir a la página de la receta o a donde desees después de la actualización
            return redirect()->route('recetas.inicio')->with('success', 'Comentario actualizado.');
        } else {
            // En caso de que el usuario no sea el propietario, puedes mostrar un mensaje de error o redirigir a una página de error.
            return redirect()->route('pagina.de.error')->with('error', 'No tienes permiso para editar este comentario.');
        }
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
