<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function acceso_estudiantes()
    {
        return view("public.acceso_estudiantes");
    }
}
