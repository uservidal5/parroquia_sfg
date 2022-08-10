<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        # code...
        return view('dashboard.index');
    }
    public function estudiantes()
    {
        return view('dashboard.estudiantes.index');
        # code...
    }
    public function profesores()
    {
        # code...
        return view('dashboard.profesores.index');
    }
}
