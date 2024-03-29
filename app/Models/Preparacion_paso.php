<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparacion_paso extends Model
{
    use HasFactory;

    /**
     * Conectamos a la bd traves de la variable $table  para asi poder manipular la informacion
     */
    protected $fillable = ['receta_id', 'pasos', 'solicitar'];

    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }

}
