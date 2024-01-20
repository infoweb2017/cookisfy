<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Calificacion;
use App\Models\Ingrediente;
use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Preparacion_paso;

class Receta extends Model
{
    use HasFactory;
    /**
     * Conectamos a la bd traves de la variable $table  para asi poder manipular la información
     */
    protected $table = 'recetas';

    //Otra forma de acceder a la bd receta
    protected $fillable = [
        'titulo',
        'descripcion',
        'categoria',
        'tiempo_preparacion',
        'categoria_id',
        'imagen',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Una receta puede tener muchas reseñas
    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }

    // Relación: Una receta tiene muchos ingredientes (muchos a muchos)
    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'receta_ingrediente', 'receta_id', 'ingrediente_id')
            ->withPivot(['cantidad', 'unidad']);
    }

    // Relación con categoría (uno a uno)
    public function categoria()
    {
       // return $this->belongsTo(Categoria::class, 'categoria_id');
       return $this->belongsTo(Categoria::class);
    }

    // Relación: Una receta puede tener muchos comentarios (muchos a muchos)
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function pasos()
    {
        return $this->hasMany(Preparacion_paso::class);
    }
}
