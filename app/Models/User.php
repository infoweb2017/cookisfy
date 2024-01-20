<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Receta;
use App\Models\Calificacion;
use App\Models\Ingrediente;
use App\Models\Comentario;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'imagen_perfil',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function isUser()
    {
        return !$this->is_admin; //si no es admin es usuario normal
    }

    //Un usuario que reseñas ha echo
    public function calificacion()
    {
        return $this->hasMany(Calificacion::class);
    }

    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }
    public function routeNotificationForMail()
    {
        return $this->email; // Cambia esto según tu estructura de datos
    }
    public function ingredientes(){
        return $this->hasMany(Ingrediente::class);
    }
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
