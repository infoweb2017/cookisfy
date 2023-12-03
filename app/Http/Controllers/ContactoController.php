<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function store(Request $request)
{
    // Validar los datos enviados desde el formulario
    $request->validate([
        'nombre' => 'required|string',
        'apellidos' => 'required|string',
        'telefono' => 'required|string',
        'correo' => 'required|email',
        'consulta' => 'required|string',
        'aceptar_politica' => 'accepted', // Validar la casilla de verificación
    ]);

    // Crear un nuevo registro en la tabla de contactos
    Contacto::create([
        'nombre' => $request->input('nombre'),
        'apellidos' => $request->input('apellidos'),
        'telefono' => $request->input('telefono'),
        'correo' => $request->input('correo'),
        'consulta' => $request->input('consulta'),
    ]);

    // Redirigir a una página de confirmación o mostrar un mensaje de éxito
    return redirect()->route('contacto.contacto_confirm');
}

}
