<?php

namespace App\Http\Controllers;

use App\Models\Sobrenosotros;
use Illuminate\Http\Request;

class SobrenosotrosController extends Controller
{
    public function index()
    {
        // Envías los datos recuperados a tu vista (archivo Blade)
        return view('sobre-nosotros');
    }
}
