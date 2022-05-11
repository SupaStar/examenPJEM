<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlCarga extends Model
{
    protected $table = 'tblcontrolcargas';
    protected $primaryKey = 'id_Control_Carga';
    protected $fillable = ['id_usuario', 'cve_accion', 'fecha', 'movimiento'];
    use HasFactory;
}
