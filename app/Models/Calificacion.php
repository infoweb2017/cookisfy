<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    /**
     * Conectamos a la bd traves de la variable $table  para asi poder manipular la informacion
     */
    protected $table = ['receta_id','user_id','valoración','resena'];

    //Una reseña pertenece a una receta
    public function recetas(){
        return $this ->belongsTo(Receta::class);
    }

    //Una calificacion le pertenece a un usuario
    public function user(){
        return $this ->belongsTo(User::class);
    }
}
