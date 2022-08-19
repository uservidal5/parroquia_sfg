<?php

namespace Database\Seeders;

use App\Models\InformacionParental;
use App\Models\Perfil;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $password = Hash::make("alex1234");


        $new_perfil = new Perfil();
        $new_perfil->cedula_per = "1727676676";
        $new_perfil->apellido_per = "Vaca";
        $new_perfil->nombre_per = "Alex";
        $new_perfil->f_nacimiento_per = "1998-02-01";
        $new_perfil->direccion_per = "Cayambe, 10 de agosto";
        $new_perfil->correo_per = "alex@correo.com";
        $new_perfil->contrasenia_per = $password;
        $new_perfil->save();
        // return $new_perfil->id;
        // PADRE
        $info_padre = new InformacionParental();
        $info_padre->tipo_parental_inf = "PADRE";
        $info_padre->perfil_id = $new_perfil->id;
        $info_padre->save();

        // MADRE
        $info_madre = new InformacionParental();
        $info_madre->tipo_parental_inf = "MADRE";
        $info_madre->perfil_id = $new_perfil->id;
        $info_madre->save();
    }
}
