<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacionParental extends Model
{
    use HasFactory;


    protected $fillable = [
        'tipo_parental_inf',
        'apellido_inf',
        'nombre_inf',
        'celular_inf',
        'bautizo_inf',
        'comunion_inf',
        'confirmacion_inf',
        'matrimonio_inf',
        'estado_civil_inf',
        'estado_inf',
        'perfil_id',
    ];
}
