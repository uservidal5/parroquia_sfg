<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\validacionCI as cedula;
use Illuminate\Http\Request;

class UpdatePerfilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * 'email' => 'required|unique:users,email,' . Auth::user()->id . '|email',
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $id = $this->input('id');
        return [
            "cedula_per" => ["required", "integer", new cedula, "unique:perfils,cedula_per," . $id],
            "apellido_per" => "required",
            "nombre_per" => "required",
            "f_nacimiento_per" => "date",
            "correo_per" => ["required", "email", "unique:perfils,correo_per," . $id],
            // "contrasenia_per" => "required",
            // "re_contrasenia_per" => "required|same:contrasenia_per",
        ];
    }
    public function messages()
    {
        return [
            "required" => "Campo obligatorio",
            "cedula_per.integer" => "Cédula solo debe contener números.",
            "cedula_per.unique" => "Cédula ya registrada.",
            "re_contrasenia_per.same" => "Las contraseñas no coinciden.",
            "correo_per.unique" => "Correo Electrónico ya registrado.",
        ];
    }
}
