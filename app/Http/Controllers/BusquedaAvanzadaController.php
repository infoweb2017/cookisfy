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

        // Realizar la consulta en la base de datos
        $resultados = Receta::where('titulo', 'like', '%' . $ingredientes . '%')
            ->where('categoria_id', $categoria)
            ->get();

        return view('recetas.resultadosAvanzados', compact('resultados'));
    }
}
