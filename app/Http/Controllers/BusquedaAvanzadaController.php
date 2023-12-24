<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;

class BusquedaAvanzada extends Controller
{
    public function buscarAvanzada(Request $request)
    {
        // Recopilar parámetros de búsqueda
        $ingredientes = $request->input('ingredientes');
        $categoria = $request->input('categoria');

        // Otros parámetros de búsqueda avanzada

        // Realizar la consulta en la base de datos
        $resultados = Receta::where('titulo', 'like', '%' . $ingredientes . '%')
            ->where('categoria_id', $categoria)
            // Agregar otros criterios de búsqueda avanzada
            ->get();

        // Pasar los resultados a la vista
        return view('recetas.resultadosAvanzados', compact('resultados'));
    }
}
