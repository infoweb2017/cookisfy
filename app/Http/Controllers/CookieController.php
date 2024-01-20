<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    //Métodos para estableces y obtener cookies
    public function setCookie() {
        $response = new Response('Cookie establecida');
        $response->withCookie(cookie('nombre_cookie', 'valor_cookie', 60));
        return $response;
    }

    public function getCookie(Request $request) {
        $valor = $request->cookie('nombre_cookie');
        return 'Valor de la cookie: ' . $valor;
    }

}
