<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    protected $primaryKey = 'matricula_id';

    protected $fillable = [
        'pago_mat',
        'estado_mat',
        'comentario_mat',
        'perfil_id',
        'curso_id',
    ];
}
