<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    // public function getRouteKeyName()
    // {
    //     return 'cedula_per';
    // }
    protected $fillable = [
        'cedula_per',
        'apellido_per',
        'nombre_per',
        'f_nacimiento_per',
        'barrio_per',
        'direccion_per',
        'correo_per',
        'contrasenia_per',
        'estado_per',
    ];
}
