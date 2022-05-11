<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'tblusuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['nombre', 'paterno', 'materno', 'login', 'password', 'activo'];
    protected $hidden = ['password','login'];

}
