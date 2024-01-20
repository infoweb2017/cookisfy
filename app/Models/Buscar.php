<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buscar extends Model
{
    use HasFactory;

    //protected $table = 'buscars';
    protected $table = ['termino', 'user_id'];
}
