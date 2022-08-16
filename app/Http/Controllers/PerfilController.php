<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Http\Requests\StorePerfilRequest;
use App\Http\Requests\UpdatePerfilRequest;
use App\Models\InformacionParental;
use App\Models\Ficha;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = array();

        $data["estudiantes"] = Perfil::all();
        // return json_encode($estudiantes);
        return view("dashboard.estudiantes.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("dashboard.estudiantes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePerfilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePerfilRequest $request)
    {
        //encrypt and decrypt
        $encriptada = encrypt($request->contrasenia_per);
        $request["contrasenia_per"] = $encriptada;

        $new_perfil = new Perfil($request->all());
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

        // FICHA
        $new_ficha = new Ficha();
        $new_ficha->perfil_id = $new_perfil->id;
        $new_ficha->save();

        return redirect(route('estudiantes.edit', ['perfil' => $new_perfil]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        return json_encode($perfil);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil, $tab)
    {
        //
        $data["tab"] = $tab;
        $data["perfil"] = $perfil;

        $data["padre"] = InformacionParental::where("perfil_id", $perfil->id)
            ->where("tipo_parental_inf", "PADRE")
            ->first();

        $data["madre"] = InformacionParental::where("perfil_id", $perfil->id)
            ->where("tipo_parental_inf", "MADRE")
            ->first();

        $data["ficha"] = Ficha::where("perfil_id", $perfil->id)
            ->first();
        // echo json_encode($data);
        return view("dashboard.estudiantes.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerfilRequest  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerfilRequest $request, Perfil $perfil)
    {
        //
        $perfil->update($request->all());
        return back()->with(["status" => "ok", "message" => "Perfil actualizado con éxito!"]);
        // return redirect(route("estudiantes.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
        $perfil->delete();
        return redirect(route("estudiantes.index"));
    }
}
