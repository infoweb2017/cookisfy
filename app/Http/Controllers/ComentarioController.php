<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\Receta;
use App\Models\User;

class ComentarioController extends Controller
{

    // Método para mostrar el formulario de creación de comentarios
    public function create()
    {
        //return view('admin.comentarios.crear');
    }

    // Método para almacenar el comentario en la base de datos
    public function store(Request $request, $recetaId)
    {
        // Validación del formulario (personaliza según tus necesidades)
        $request->validate([
            //'user_id' => auth()->id(),
            'descripcion' => 'required|string|max:255',
            'receta_id' => 'required|exists:recetas,id',
        ]);

        // Crea el comentario asociado a la receta y al usuario autenticado
        $receta = Receta::findOrFail($recetaId);

        Comentario::create([
            'user_id' => auth()->id(),
            'receta_id' => $receta->id,
            'descripcion' => $request->descripcion,
        ]);

        // Usuario normal
        return redirect()->route('recetas.show', $receta->id)->with('success', 'Comentario actualizado.');


        // return back()->with('success', 'Comentario agregado.');
        //return view('recetas.inicio', ['recetaId' => $recetaId]);
    }

    public function show(Receta $receta)
    {
        $receta->load('comentarios');
        // Mostrar la vista de detalle de un comentario
        return view('recetas.inicio', compact('receta'));
    }

    public function edit(Comentario $comentario)
    {
        // Mostrar el formulario editar
        return view('comentarios.edit', compact('comentario'));
    }

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

    public function destroy(Comentario $comentario)
    {
        $comentario->delete();

        return back()->with('success', 'Comentario eliminado.');
    }

    public function nuevoComentario(Request $request)
    {
        // Validación del formulario (personaliza según tus necesidades)
        $request->validate([
            'receta_id' => 'required|exists:recetas,id',
            'descripcion' => 'required|string|max:255',
        ]);

        // Crea el comentario asociado a la receta y al usuario autenticado
        Comentario::create([
            'user_id' => auth()->id(),
            'receta_id' => $request->input('receta_id'),
            'descripcion' => $request->input('descripcion'),
        ]);


        return redirect()->route('recetas.inicio', $request->input('receta_id'))->with('success', 'Comentario agregado.');
    }


    //Administrar comentarios
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

    // Mostrar el formulario de creación
    public function createComentarioForm()
    {
        $recetas = Receta::all();
        $usuarios = User::all();
        return view('admin.comentarios.crear', compact('recetas', 'usuarios'));
    }

    // Procesar el formulario y guardar el comentario
    public function createComentario(Request $request)
    {
        // Validación del formulario (personaliza según tus necesidades)
        $request->validate([
            'receta_id' => 'required|exists:recetas,id',
            'descripcion' => 'required|string|max:255',
        ]);

        // Crea el comentario asociado a la receta y al usuario autenticado
        Comentario::create([
            'user_id' => auth()->id(),
            'receta_id' => $request->input('receta_id'),
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('admin.comentarios')->with('success', 'Comentario creado correctamente.');
    }
    // Mostrar el formulario de edición de comentario
    public function editComentarioForm($comentarioId)
    {
        $recetas = Receta::all();
        $usuarios = User::all();
        $comentario = Comentario::findOrFail($comentarioId);
        return view('admin.comentarios.edit', compact('comentario', 'recetas', 'usuarios'));
    }

    // Procesar el formulario de edición y actualizar el comentario
    public function updateComentario(Request $request, $comentarioId)
    {
        $comentario = Comentario::findOrFail($comentarioId);

        // Validación del formulario (personaliza según tus necesidades)
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        // Actualiza el comentario
        $comentario->update([
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('admin.comentarios')->with('success', 'Comentario actualizado correctamente.');
    }

    public function deleteComentario($comentarioId)
    {
        $comentario = Comentario::findOrFail($comentarioId);
        $comentario->delete();

        return redirect()->route('admin.comentarios')->with('success', 'Comentario eliminado correctamente.');
    }
}
