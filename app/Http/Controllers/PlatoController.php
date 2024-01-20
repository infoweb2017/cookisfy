<?php

namespace App\Http\Controllers;

use App\Models\Platos_imagenes;
use Illuminate\Http\Request;

class PlatoController extends Controller
{
    public function index() {
        $platos = Platos_imagenes::all();
        return view('galeria', compact('platos'));
    }
}
