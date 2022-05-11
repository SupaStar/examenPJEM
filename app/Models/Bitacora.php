<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'tblbitacoras';
    protected $primaryKey = 'id_Bitacoras';
    protected $fillable = ['id_usuario', 'cve_accion', 'fecha', 'movimiento'];
    use HasFactory;
}
