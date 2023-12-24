<?php

namespace App\Http\Controllers;

use App\Models\preparacion_paso;
use App\Models\Receta;
use Illuminate\Http\Request;

class PreparacionPasoController extends Controller
{
    // Mostrar todos los pasos de una receta específica
    public function index($recetaId)
    {
        $receta = Receta::with('pasos')->findOrFail($recetaId);
        return view('pasos.index', compact('receta'));
    }

    // Mostrar el formulario para agregar un nuevo paso
    public function create($recetaId)
    {
        return view('pasos.create', compact('recetaId'));
    }

    // Guardar un nuevo paso
    public function store(Request $request, $recetaId)
    {
        $request->validate([
            'descripcion' => 'required',
            // Otros campos si son necesarios
        ]);

        $receta = Receta::findOrFail($recetaId);
        $receta->pasos()->create($request->all());

        return redirect()->route('pasos.index', $recetaId)->with('success', 'Paso creado con éxito.');
    }

    // Mostrar el formulario para editar un paso existente
    public function edit($id)
    {
        $paso = Preparacion_paso::findOrFail($id);
        return view('pasos.edit', compact('paso'));
    }

    // Actualizar un paso
    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required',
            // Otros campos si son necesarios
        ]);

        $paso = Preparacion_paso::findOrFail($id);
        $paso->update($request->all());

        return redirect()->route('pasos.index', $paso->receta_id)->with('success', 'Paso actualizado con éxito.');
    }

    // Eliminar un paso
    public function destroy($id)
    {
        $paso = Preparacion_paso::findOrFail($id);
        $recetaId = $paso->receta_id;
        $paso->delete();

        return redirect()->route('pasos.index', $recetaId)->with('success', 'Paso eliminado con éxito.');
    }
}
