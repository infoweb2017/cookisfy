<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    /**
     * Conectamos a la bd traves de la variable $table  para asi poder manipular la información
     */
    protected $table = 'comentarios';

    // Relación: Un comentario pertenece a una receta
    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
