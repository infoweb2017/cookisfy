<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * Los URI que deben ser accesibles mientras el modo de mantenimiento está activado.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
