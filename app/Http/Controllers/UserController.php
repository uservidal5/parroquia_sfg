<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Mail\CambioInformarcion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mi_perfil()
    {
        # code...
        return view("dashboard.user.profile");
    }
    public function actualizar_datos_personales(Request $request)
    {
        # code...
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . Auth::user()->id . '|email',
        ]);
        $id = Auth::id();

        $user = User::find($id);
        $user->update($request->all());
        // Envio de mails
        Mail::to("alx80ghero@gmail.com")->queue(new CambioInformarcion($user));
        //

        return back()->with(["status" => true, "message" => "Informacion Actualizada!"]);
    }
    public function cambiar_clave_acceso(Request $request)
    {
        # code...
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required',
            're_new_password' => 'required|same:new_password',
        ], [
            "old_password.current_password" => "Contraseña Incorrecta.",
            "re_new_password.same" => "Las contraseñas deben coincidir.",
        ]);

        $id = Auth::id();

        $user = User::find($id);

        $user->update(
            ['password' => Hash::make($request->new_password)]
        );

        return back()->with(["status" => true, "message" => "Contraseña Actualizada!"]);
    }
}
