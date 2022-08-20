<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursoRequest;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data["cursos"] = Curso::all();
        return view("dashboard.cursos.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $curso = new Curso();
        return view("dashboard.cursos.create", ["curso" => $curso]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCursoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCursoRequest $request)
    {
        //
        $request["disponibilidad_cur"] = $request->disponibilidad_cur == "1" ? 1 : 0;
        $new_curso = new Curso($request->all());
        $new_curso->save();
        return redirect(route("cursos.edit", ["curso" => $new_curso]))->with(["status" => "ok", "message" => "Registro creado con éxito!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
        // return $curso;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //
        return view("dashboard.cursos.edit", ["curso" => $curso]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCursoRequest  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCursoRequest $request, Curso $curso)
    {
        //
        $request["disponibilidad_cur"] = $request->disponibilidad_cur == "1" ? 1 : 0;
        $curso->update($request->all());
        return back()->with(["status" => "ok", "message" => "Registro actualizado con éxito!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        //
        $curso->delete();
        return back()->with(["status" => "ok", "message" => "Registro eliminado con éxito!"]);
    }
}
