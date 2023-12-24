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
        return $this->belongsToMany(Receta::class, 'ingredientes', 'ingrediente_id', 'receta_id')
            ->withPivot(['cantidad_ingredientes', 'unidad']);
    }

    public function categorias()
    {
        // return $this->belongsToMany(Categoria::class, 'categoria_ingrediente');
        return $this->morphToMany(Categoria::class, 'categorias_relacionadas');
    }
}
