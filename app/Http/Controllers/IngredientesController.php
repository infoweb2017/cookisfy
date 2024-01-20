<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;

use App\Models\ingredientes;
use Illuminate\Http\Request;

class IngredientesController extends Controller
{
    // Muestra una lista de ingredientes
    public function listIngredientes()
    {
        $ingredientes = Ingrediente::paginate(10);
        $ingredientes->withPath('ingredientes'); // Establece la URL base para los enlaces de paginación
        return view('admin/ingredientes/lista')->with('ingredientes', $ingredientes);
    }

    // Muestra el formulario para crear un nuevo ingredientes
    public function create()
    {
        return view('admin.ingredientes.crear');
    }

    // Guarda una nuevo ingredientes en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|max:255',
            'cantidad_ingredientes' => 'nullable|integer',
            'opcional' => 'nullable|boolean',
            'unidad' => 'nullable|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        // Crear la nuevo ingrediente
        Ingrediente::create([
            'nombre' => $request->nombre,
            'cantidad_ingredientes' => $request->cantidad_ingredientes,
            'opcional' => $request->opcional,
            'unidad' => $request->unidad,
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('admin.ingredientes')
            ->with('success', 'Categoria creada con éxito');
    }

    // Muestra el formulario para editar un ingrediente existente
    public function edit(Ingrediente $ingrediente)
    {
        return view('admin.ingredientes.edit', compact('ingrediente'));
    }

    // Actualiza un ingrediente en la base de datos
    public function update(Request $request, Ingrediente $ingrediente)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|max:255',
            'cantidad_ingredientes' => 'nullable|integer',
            'opcional' => 'nullable',
            'unidad' => 'nullable',
            'categoria_id' => 'required|exists:categorias,id',
        ]);
        
        // Datos a actualizar
        $data = [
            'nombre' => $request->nombre,
            'cantidad_ingredientes' => $request->cantidad_ingredientes,
            'opcional' => $request->opcional,
            'unidad' => $request->unidad,
        ];

        // Actualizar el ingrediente
        $ingrediente->update($data);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('admin.ingredientes')
            ->with('success', 'Ingrediente actualizada con éxito');
    }

    // Elimina un artículo de la base de datos
    public function delete(Ingrediente $ingrediente)
    {
        $ingrediente->delete();
        return redirect()->route('admin.ingrediente')
            ->with('success', 'Ingrediente eliminada con éxito');
    }
}
