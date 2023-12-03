<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $guarded = [];
    /**
     * Conectamos a la bd traves de la variable $table  para asi poder manipular la informacion
     */
    protected $table = 'recetas'; 

    //Una receta puede tener muchas reseñas
    public function reseñas(){
        return $this->hasMany(calificacion::class);
    }

    // Relación: Una receta tiene muchos ingredientes
    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'receta_ingrediente')
        ->withPivot(['cantidad_ingredientes', 'unidad']);
    }

    public function categoria()
{
    return $this->belongsTo(Categoria::class, 'categoria_id');
}

}
