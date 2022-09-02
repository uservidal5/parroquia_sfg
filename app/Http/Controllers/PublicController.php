<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerfilRequestPublic;
use App\Http\Requests\UpdateInformacionParentalRequest;
use App\Http\Requests\UpdatePerfilContrasenaRequest;
use App\Http\Requests\UpdatePerfilRequest;
use App\Models\InformacionParental;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Faker\Generator;
use Illuminate\Container\Container;

class PublicController extends Controller
{
    //
    public function index()
    {
        # code...
        return view("public.index");
    }
    public function login()
    {
        # code...
        return view("public.login");
    }
    public function acceso_estudiantes($type)
    {
        $idPerfilLogin = session('idPerfilLogin');
        if ($idPerfilLogin) {
            return redirect(route("inicio_estudiante.index"));
        }
        $data["type"] = $type;
        $data["perfil"] = new Perfil();

        return view("public.acceso_estudiantes", $data);
    }
    public function public_estudiante_store(StorePerfilRequestPublic $request)
    {
        # code...
        $new_perfil = new Perfil($request->validated());
        $new_perfil->contrasenia_per = Hash::make($request->contrasenia_per);
        $new_perfil->save();
        // Informacion Parental
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
        // LOGIN
        // SET SESSION
        session(['idPerfilLogin' => $new_perfil->id]);
        // return $new_perfil;
        return redirect(route("inicio_estudiante.index"));
    }
    public function public_estudiante_update(UpdatePerfilRequest $request, Perfil $perfil)
    {
        $perfil->update($request->all());
        return back()->with(["status" => "ok", "message" => "Perfil actualizado con éxito!"]);
    }
    public function public_estudiante_cambio_clave(UpdatePerfilContrasenaRequest $request, Perfil $perfil)
    {
        //
        $encriptada = Hash::make($request->contrasenia_per);
        $request["contrasenia_per"] = $encriptada;
        $perfil->update($request->all());
        return back()->with(["status" => "ok", "message" => "Contraseña actualizada con éxito!"]);
        // return redirect(route("estudiantes.index"));
    }
    public function public_informacion_parental(UpdateInformacionParentalRequest $request, InformacionParental $informacionParental)
    {
        //
        $request["estado_inf"] = $request->estado_inf == "1" ? 1 : 0;
        $informacionParental->update($request->all());
        return back()->with(["status" => "ok", "message" => "Perfil actualizado con éxito!"]);
    }
    public function public_estudiante_login(Request $request)
    {
        # code...
        $request->validate([
            "cedula_per" => "required|exists:perfils",
            "contrasenia_per" => "required",
        ], [
            "required" => "Campo obligatorio",
            "cedula_per.exists" => "Cédula no encontrada.",
        ]);
        $perfil = Perfil::where("cedula_per", $request->cedula_per)->first();

        // return $perfil;
        if (Hash::check($request->contrasenia_per, $perfil->contrasenia_per)) {
            session(['idPerfilLogin' => $perfil->id]);
            return redirect(route("inicio_estudiante.index"));
        } else {
            return back()->withErrors(['cedula_per' => 'Cédula o contraseña incorrectos.'])->withInput();
        }
    }
    // SESION DEL ESTUDIANTE
    public function inicio_estudiante($tab = '', $parental = '')
    {
        $idPerfilLogin = session('idPerfilLogin');
        $perfil = Perfil::find($idPerfilLogin);
        // return $perfil;
        $data["perfil"] = $perfil;
        $data["tab"] = $tab;
        $data["parental"] = $parental;

        switch ($tab) {
            case 'perfil':
                # code...
                return view("public.estudiante.perfil", $data);
                break;
            case 'cambio_clave':
                # code...
                return view("public.estudiante.cambio_clave", $data);
                break;
            case 'informacion_parental':
                if ($parental == "padre") {
                    $data["info_parental"] = InformacionParental::where("perfil_id", $perfil->id)
                        ->where("tipo_parental_inf", "PADRE")
                        ->first();
                } else {
                    $data["info_parental"] = InformacionParental::where("perfil_id", $perfil->id)
                        ->where("tipo_parental_inf", "MADRE")
                        ->first();
                }
                return view("public.estudiante.informacion_parental", $data);
                # code...
                break;

            default:
                # code...
                return view("public.protected.index", $data);
                break;
        }
    }
    public function restore_password(Request $request)
    {
        # code...
        $request->validate([
            "cedula_per" => "required|exists:perfils",
            "f_nacimiento_per" => "required",
        ], [
            "required" => "Campo obligatorio",
            "cedula_per.exists" => "Cédula no encontrada.",
        ]);

        $perfil = Perfil::where("cedula_per", $request->cedula_per)
            ->where("f_nacimiento_per", $request->f_nacimiento_per)
            ->first();

        if ($perfil) {
            $faker = Container::getInstance()->make(Generator::class);
            // $new_password =  $faker->regexify('[A-Z]{5}[0-4]{5}');

            $new_password =  $faker->password(10);
            $perfil->update(['contrasenia_per' => Hash::make($new_password)]);
            return back()->with(['new_password' => $new_password]);
        } else {
            return back()->withErrors(['cedula_per' => 'No se encontraron registros.'])->withInput();
        }
    }
    public function logout_estudiante()
    {
        # code...
        session()->forget('idPerfilLogin');
        return redirect(route("acceso_estudiantes", ["type" => "login"]));
    }
}
