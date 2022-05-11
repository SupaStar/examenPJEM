<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
    protected $table = 'tblgrupos_sistema';
    protected $primaryKey = 'cve_grupo_sistema';
    protected $fillable = ['descripcion_grupo', 'activo'];
    use HasFactory;
}
