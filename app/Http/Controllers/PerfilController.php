<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Http\Requests\StorePerfilRequest;
use App\Http\Requests\UpdatePerfilRequest;

class PerfilController extends Controller
{
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
        return redirect(route("estudiantes.index"));
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
    public function edit(Perfil $perfil)
    {
        //
        $data["perfil"] = $perfil;
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
        return redirect(route("estudiantes.index"));
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
