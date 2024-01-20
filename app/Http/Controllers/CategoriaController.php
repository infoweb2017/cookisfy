<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Muestra una lista de categoria
    public function listCategoria()
    {
        $categorias = categoria::paginate(10);
        $categorias->withPath('categorias'); // Establece la URL base para los enlaces de paginación
        return view('admin/categorias/lista')->with('categorias', $categorias);
    }

    // Muestra el formulario para crear un nueva categoria
    public function create()
    {
        return view('admin.categorias.crear');
    }

    // Guarda una nueva categoria en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'categoria_tipo' => 'required',
        ]);


        // Crear la nueva categoria
        categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'categoria_tipo' => $request->categoria_tipo,
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('admin.categorias')
            ->with('success', 'Categoria creada con éxito');
    }

    // Muestra el formulario para editar una categoria existente
    public function edit(categoria $categoria)
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    // Actualiza un artículo en la base de datos
    public function update(Request $request, categoria $categoria)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'categoria_tipo' => 'required',
        ]);

        // Datos a actualizar
        $data = [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'categoria_tipo' => $request->categoria_tipo,
        ];

        // Actualizar la categoria
        $categoria->update($data);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('admin.categorias')
            ->with('success', 'Categoria actualizada con éxito');
    }

    // Elimina un artículo de la base de datos
    public function delete(categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('admin.categorias')
            ->with('success', 'Categoria eliminada con éxito');
    }
}
