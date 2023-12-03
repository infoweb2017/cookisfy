<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;

    /**
     * Conectamos a la bd traves de la variable $table  para asi poder manipular la informacion
     */
    protected $table = 'ingredientes';
    
    
    // Relación: Muchos ingredientes pueden estar en muchas recetas
    public function recetas()
{
    return $this->belongsToMany(Receta::class, 'receta_ingrediente')
    ->withPivot(['cantidad_ingredientes', 'unidad']);
}
}
