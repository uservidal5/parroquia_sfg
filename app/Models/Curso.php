<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'nivel_cur',
        'nombre_cur',
        'disponibilidad_cur',
        'fecha_inicio_cur',
        'responsable_cur',
        'costo_cur',
        'comentario_cur',
    ];
}
