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
    protected $fillable = ['nombre', 'descripcion', 'categoria_tipo'];

    // Relación: Una categroia tiene muchas recetas (uno a muchos)
    public function recetas()
    {
        //return $this->belongsToMany(Receta::class, 'categoria_receta');
        //return $this->morphedByMany(Receta::class, 'categorias_relacionadas');
        return $this->hasMany(Receta::class);
    }

    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'categoria_ingrediente');
        //return $this->morphedByMany(Ingrediente::class, 'categorias_relacionadas');
    }

    /*public function categorizable()
    {
        return $this->morphTo();
    }*/
}
