<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'ingredientes',
        'descripcion',
        'categoria',
        'tiempo_preparacion',
        'categoria_id',
        'imagen',
    ];
    /**
     * Conectamos a la bd traves de la variable $table  para asi poder manipular la información
     */
    //protected $table = 'recetas';
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Una receta puede tener muchas reseñas
    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }

    // Relación: Una receta tiene muchos ingredientes
    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'ingredientes', 'receta_id', 'ingrediente_id')
            ->withPivot(['cantidad_ingredientes', 'unidad']);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
        //return $this->belongsToMany(Categoria::class, 'categoria_receta');
        //return $this->morphToMany(Categoria::class, 'categorias_relacionadas');
    }

    // Relación: Una receta puede tener muchos comentarios
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function pasos()
    {
        return $this->hasMany(Preparacion_paso::class);
    }
}
