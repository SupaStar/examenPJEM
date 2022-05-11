<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'tblsolicitudes';
    protected $primaryKey = 'id_Solicitudes';
    protected $fillable = ['id_usuario', 'cve_accion', 'nombre_solicitante','paterno_solicitante','materno_solicitante', 'fecha', 'movimiento'];
    use HasFactory;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
