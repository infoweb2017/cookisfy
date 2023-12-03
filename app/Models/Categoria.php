<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    /**
     * Conectamos a la bd traves de la variable $table  para asi poder manipular la informacion
     */
    protected $table = 'categorias';

    // Relación: Una categroia tiene muchas recetas
    public function recetas()
    {
       return $this->hasMany(Receta::class);
    }
}
