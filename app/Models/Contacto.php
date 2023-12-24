<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contactos';
    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'correo',
        'consulta',
    ];
}
