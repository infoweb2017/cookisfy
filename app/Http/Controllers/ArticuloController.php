<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    // Muestra una lista de artículos
    public function listArticulos()
    {
        $articulos = Articulo::all();
        return view('admin/articulos/lista', compact('articulos'));
    }

    // Muestra el formulario para crear un nuevo artículo
    public function create()
    {
        return view('admin.articulos.crear');
    }

    // Guarda un nuevo artículo en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'url' => 'required|url',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Manejar la carga de la imagen
        $imagen = null;
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $imagen = $request->imagen->store('images/articulos', 'public');
        }

        // Crear el nuevo artículo
        Articulo::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'url' => $request->url,
            'imagen' => $imagen,
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('admin.articulos')
            ->with('success', 'Artículo creado con éxito');
    }

    // Muestra el formulario para editar un artículo existente
    public function edit(Articulo $articulo)
    {
        return view('admin.articulos.edit', compact('articulo'));
    }

    // Actualiza un artículo en la base de datos
    public function update(Request $request, Articulo $articulo)
    {
        // Validar los datos del formulario
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'url' => 'required|url',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Datos a actualizar
        $data = [
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'url' => $request->url,
        ];

        // Si se sube una nueva imagen, procesarla
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $data['imagen'] = $request->imagen->store('images/articulos', 'public');
        }

        // Actualizar el artículo
        $articulo->update($data);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('admin.articulos')
            ->with('success', 'Artículo actualizado con éxito');
    }

    // Elimina un artículo de la base de datos
    public function delete(Articulo $articulo)
    {
        $articulo->delete();
        return redirect()->route('admin.articulos')
            ->with('success', 'Artículo eliminado con éxito');
    }
}
