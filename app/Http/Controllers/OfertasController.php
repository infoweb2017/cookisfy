<?php

namespace App\Http\Controllers;

use App\Models\Ofertas;
use Illuminate\Http\Request;

class OfertasController extends Controller
{

    // Muestra una lista de ofertas
    public function listOfertas()
    {
        $ofertas = Ofertas::all();
        return view('admin/ofertas/lista', compact('ofertas'));
    }
    // Muestra el formulario para crear una nueva oferta
    public function create()
    {
        return view('admin.articulos.crear');
    }

    // Guarda una nueva oferta en la base de datos
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
            $imagen = $request->imagen->store('images/ofertas', 'public');
        }

        // Crear el nueva oferta
        Ofertas::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'url' => $request->url,
            'imagen' => $imagen,
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('admin.ofertas')
            ->with('success', 'Oferta creada con éxito');
    }

    // Muestra el formulario para editar una oferta existente
    public function edit(Ofertas $oferta)
    {
        return view('admin.ofertas.edit', compact('oferta'));
    }

    // Actualiza la oferta en la base de datos
    public function update(Request $request, Ofertas $oferta)
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
            $data['imagen'] = $request->imagen->store('images/ofertas', 'public');
        }

        // Actualizar el oferta
        $oferta->update($data);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('admin.ofertas')
            ->with('success', 'Oferta actualizada con éxito');
    }

    // Elimina la oferta de la base de datos
    public function destroy(Ofertas $oferta)
    {
        $oferta->delete();
        return redirect()->route('admin.ofertas')
            ->with('success', 'Oferta eliminada con éxito');
    }
}
