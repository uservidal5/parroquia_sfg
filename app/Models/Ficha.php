<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;

    protected $fillable = [
        'f_bautizo_fic',
        'iniciacion_fic',
        'comunion_i_fic',
        'comunion_ii_fic',
        'anio_biblico_fic',
        'confirmacion_i_fic',
        'confirmacion_ii_fic',
        'parentesco_representante_fic',
        'celular_representante_fic',
        'correo_representante_fic',
        'observaciones_fic',
    ];
}
