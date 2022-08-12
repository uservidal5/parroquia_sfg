<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerfilRequest;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view("public.acceso_estudiantes", $data);
    }
    public function public_estudiante_store(StorePerfilRequest $request)
    {
        # code...
        $new_perfil = new Perfil($request->validated());
        $new_perfil->contrasenia_per = Hash::make($request->contrasenia_per);
        $new_perfil->save();
        // LOGIN
        // SET SESSION
        session(['idPerfilLogin' => $new_perfil->id]);
        // return $new_perfil;
        return redirect(route("inicio_estudiante.index"));
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
    public function inicio_estudiante()
    {
        $idPerfilLogin = session('idPerfilLogin');
        $perfil = Perfil::find($idPerfilLogin);
        // return $perfil;
        $data["perfil"] = $perfil;
        return view("public.protected.index", $data);
    }
    public function logout_estudiante()
    {
        # code...
        session()->forget('idPerfilLogin');
        return redirect(route("acceso_estudiantes", ["type" => "login"]));
    }
}
