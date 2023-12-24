<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliticaController extends Controller
{
    public function privacidad()
    {
        return view('politica.privacidad'); // Creo la vista 'politica/privacidad.blade.php'
    }

    public function cookies()
    {
        return view('politica.cookies'); // Creo la vista 'politica/cookies.blade.php'
    }
}
