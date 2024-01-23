<?php

namespace App\Http\Controllers;

use App\Mail\AdminNewSubscriberMail;
use App\Mail\SubscriptionConfirmationMail;
use App\Models\Subscribir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {
        $validaData = $request->validate([
            'email' => 'required|email|unique:subscribirs' //Validar en la base de datos 
        ]);

        $subscribir = new Subscribir();
        $subscribir->email = $validaData['email'];
        $subscribir->save();

        // Enviar correo de confirmación al suscriptor
        Mail::to($validaData['email'])->send(new SubscriptionConfirmationMail());

        // Enviar correo de notificación al administrador
        Mail::to(env('ADMIN_EMAIL'))->send(new AdminNewSubscriberMail($validaData['email']));

        return redirect()->back()->with('success', '¡Gracias por suscribirte a nuestro boletín!');
    }
}
