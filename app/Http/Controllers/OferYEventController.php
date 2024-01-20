<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Ofertas;
use Illuminate\Http\Request;

class OferYEventController extends Controller
{
    public function mostrarRecetasYArticulos()
    {
        $ofertas = Ofertas::all(); // Obtener las primeras 10 recetas
        $eventos = Evento::all();

        return view('index', compact('ofertas', 'eventos'));
    }
}
