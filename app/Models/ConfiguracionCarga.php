<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionCarga extends Model
{
    protected $table = 'tblconfiguracioncarga';
    protected $primaryKey = 'id_Configuracion_Carga';
    protected $fillable = ['id_usuario', 'cve_accion', 'fecha', 'movimiento'];
    use HasFactory;
}
