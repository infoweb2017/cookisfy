<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscarController extends Controller
{
    public function buscar(Request $request)
{
    
  
$query = $request->input('query'); // Obtener el término de búsqueda del formulario

    // Realizar la búsqueda en la base de datos
    $resultados = Receta::where('titulo', 'like', '%' . $query . '%')->get();

    return view('recetas.resultados', compact('resultados', 'query'));
}
}
