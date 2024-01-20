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

    protected $fillable = ['nombre', 'cantidad_ingredientes', 'opcional', 'unidad', 'categoria_id'];

    // Relación: Muchos ingredientes pueden estar en muchas recetas(muchos a muchos)
    public function recetas()
    {
        return $this->belongsToMany(Receta::class, 'receta_ingrediente', 'ingrediente_id', 'receta_id')
            ->withPivot(['cantidad', 'unidad']);
        //return $this->belongsToMany(Receta::class);

    }

    public function categorias()
    {
        // return $this->belongsToMany(Categoria::class, 'categoria_ingrediente');
        return $this->morphToMany(Categoria::class, 'categorias_relacionadas');
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
