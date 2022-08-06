<?php

namespace App\Http\Controllers;

use App\Models\InformacionParental;
use App\Http\Requests\StoreInformacionParentalRequest;
use App\Http\Requests\UpdateInformacionParentalRequest;

class InformacionParentalController extends Controller
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
     * @param  \App\Http\Requests\StoreInformacionParentalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInformacionParentalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InformacionParental  $informacionParental
     * @return \Illuminate\Http\Response
     */
    public function show(InformacionParental $informacionParental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InformacionParental  $informacionParental
     * @return \Illuminate\Http\Response
     */
    public function edit(InformacionParental $informacionParental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInformacionParentalRequest  $request
     * @param  \App\Models\InformacionParental  $informacionParental
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInformacionParentalRequest $request, InformacionParental $informacionParental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InformacionParental  $informacionParental
     * @return \Illuminate\Http\Response
     */
    public function destroy(InformacionParental $informacionParental)
    {
        //
    }
}
