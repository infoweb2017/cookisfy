<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    // Muestra una lista de eventos
    public function listEventos()
    {
        $eventos = Evento::all();
        return view('admin/eventos/lista', compact('eventos'));
    }
    // Muestra el formulario para crear un nuevo evento
    public function create()
    {
        return view('admin.eventos.crear');
    }

    // Guarda un nuevo evento en la base de datos
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
            $imagen = $request->imagen->store('images/eventos', 'public');
        }

        // Crear el nuevo evento
        Evento::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'url' => $request->url,
            'imagen' => $imagen,
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('admin.eventos')
            ->with('success', 'Oferta creada con éxito');
    }

    // Muestra el formulario para editar un evento existente
    public function edit(Evento $evento)
    {
        return view('admin.eventos.edit', compact('evento'));
    }

    // Actualiza el evento en la base de datos
    public function update(Request $request, Evento $evento)
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
            $data['imagen'] = $request->imagen->store('images/eventos', 'public');
        }

        // Actualizar el oferta
        $evento->update($data);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('admin.eventos')
            ->with('success', 'Evento actualizado con éxito');
    }

    // Elimina el evento en la base de datos
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->route('admin.eventos')
            ->with('success', 'Evento eliminado con éxito');
    }
}
