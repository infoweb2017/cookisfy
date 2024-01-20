<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMail;
use App\Models\Contacto;
use App\Models\User;
use App\Notifications\ContactoNotification;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    //Pagina de formulario de contacto
    public function index()
    {
        return view('contacto.form-contacto');
    }

    //Validar formulario contacto
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
        $contacto = Contacto::create([
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'telefono' => $request->input('telefono'),
            'correo' => $request->input('correo'),
            'consulta' => $request->input('consulta'),
        ]);
        // Agregar la notificación
        $contacto->update([
            'notificacion' => 'Nueva notificación de contacto',
        ]);
        // Enviar la notificación al administrador
        $admin = User::where('is_admin', true)->first(); // Obtén al usuario administrador
        if ($admin) {
            $admin->notify(new ContactoNotification($contacto)); // Pasa el contacto como argumento
        }
        Mail::to($admin)->send(new ContactoMail($contacto));
 
        // Redirigir a una página de confirmación o mostrar un mensaje de éxito
        return redirect()->route('contacto.contacto_confirm');
    }

    //pagina de confirmacion 
    public function contacto_confirm()
    {
        return view('contacto.contacto_confirm');
    }

    //Ver las consultas echas
    public function show($id)
    {
        $consulta = Contacto::findOrFail($id);

        return view('consulta.ver', compact('consulta'));
    }
}
