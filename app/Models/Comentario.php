<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Receta;
use App\Models\User;

class Comentario extends Model
{
    use HasFactory;

    /**
     * Conectamos a la bd traves de la variable $table  para asi poder manipular la información
     */
    protected $table = 'comentarios';
    protected $fillable = ['user_id', 'receta_id', 'descripcion'];

    // Relación: Un comentario pertenece a una receta
    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
