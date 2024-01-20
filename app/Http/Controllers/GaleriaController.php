<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    //

    public function fotos_platos()
    {
        $imagenes = Receta::pluck('imagen'); // Obtiene solo la columna 'imagen'
        return view('galeria_img_platos', ['imagenes' => $imagenes]);
    }
}
