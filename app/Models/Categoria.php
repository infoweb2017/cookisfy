<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    /**
     * Conectamos a la bd traves de la variable $table  para asi poder manipular la información
     */
    protected $table = 'categorias';

    // Relación: Una categroia tiene muchas recetas
    /**Recetas: La relación recetas utiliza la función morphedByMany para indicar una relación 
     * polimórfica con las recetas. Esto significa que una categoría puede estar asociada a muchas 
     * recetas y que las recetas pueden estar asociada  a muchas categorías. En este caso, la
     *  recetas se pueden relacionar con las categorías a través del nombre categorias_relacionadas. */
    public function recetas()
    {
        //return $this->belongsToMany(Receta::class, 'categoria_receta');
        return $this->morphedByMany(Receta::class, 'categorias_relacionadas');
    }

    /**
     * Ingredientes: La relación ingredientes también utiliza la función morphedByMany 
     * para indicar una relación polimórfica con los ingredientes. De manera similar, 
     * una categoría puede estar asociada a muchos ingredientes, y los ingredientes 
     * pueden estar asociados a muchas categorías a través del nombre categorias_relacionadas.
     */
    public function ingredientes()
    {
        //return $this->belongsToMany(Ingrediente::class, 'categoria_ingrediente');
        return $this->morphedByMany(Ingrediente::class, 'categorias_relacionadas');
    }

    /**
     * La utilizo para establecer una relación polimórfica, permite que un modelo esté asociado a varios otros modelos en lugar
     *  de estar asociado a uno solo. En este caso, se utiliza para manejar la relación entre las categorías y otros modelos (ingredientes y recetas)
     */
    public function categorizable()
    {
        return $this->morphTo();
    }
}
