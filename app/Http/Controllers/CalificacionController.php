<?php

namespace App\Http\Controllers;

use App\Models\calificacion;
use App\Models\Receta;
use Illuminate\Http\Request;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Receta $receta)
    {
        $request->validate([
            'valoracion' => 'required|string',
            'resena' => 'required|integer|min:1|max:5',
        ]);

        $resena = new calificacion();
        $resena->receta_id = $receta->id;
        $resena->user_id = auth()->id(); // Opcional, si estás rastreando qué usuario hizo la reseña
        $resena->contenido = $request->valoración;
        $resena->calificacion = $request->reseña;
        $resena->save();

        return back()->with('success', 'Reseña agregada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(calificacion $calificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(calificacion $calificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, calificacion $calificacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(calificacion $calificacion)
    {
        //
    }
}
