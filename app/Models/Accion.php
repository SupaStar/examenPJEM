<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    protected $table = 'tblacciones';
    protected $primaryKey = 'cve_acciones';
    protected $fillable = ['descripcion', 'activo'];
    use HasFactory;
}
