<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;

use App\Models\ingredientes;
use Illuminate\Http\Request;

class IngredientesController extends Controller
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255', // Ajusta las reglas de validación según sea necesario
        ]);

        $ingrediente = new Ingrediente();
        $ingrediente->nombre = ~$validatedData['nombre'];
        $ingrediente->save();

        return response()->json(['success' => 'Ingrediente guardado con éxito.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingrediente $ingredientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingrediente $ingredientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ingrediente $ingredientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingrediente $ingredientes)
    {
        //
    }
}
