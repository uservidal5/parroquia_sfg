<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Http\Requests\StoreMatriculaRequest;
use App\Http\Requests\UpdateMatriculaRequest;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMatriculaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatriculaRequest $request)
    {
        //
        $new_matricula = new Matricula($request->all());
        $new_matricula->save();
        return back()->with(["status" => "ok", "message" => "Matricula realizada con éxito!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatriculaRequest  $request
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatriculaRequest $request, Matricula $matricula)
    {
        //
        $request["pago_mat"] = $request->pago_mat == "1" ? 1 : 0;

        $matricula->update($request->all());
        return back()->with(["status" => "ok", "message" => "Matricula actualizada con éxito!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        //
        $matricula->delete();
        return back()->with(["status" => "ok", "message" => "Matricula removida con éxito!"]);
    }

    public function documento_matricula(Matricula $matricula)
    {
        # code...
        $data["matricula"] = $matricula;
        $data["estudiante"] = $matricula->estudiante;
        $data["curso"] = $matricula->curso;
        $pdf = FacadePdf::loadView('dashboard.matriculas.filePDF', $data);
        return $pdf->stream();
    }
}
