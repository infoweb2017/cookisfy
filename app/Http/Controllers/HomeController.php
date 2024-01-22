<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Evento;
use App\Models\Ofertas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $eventos = Evento::all();
        $ofertas = Ofertas::all();
        $comentarios = Comentario::all();

        return view('index', compact(['eventos', 'ofertas','comentarios']));
    }
}
