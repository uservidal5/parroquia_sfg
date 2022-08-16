<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\validacionCI as cedula;

class StorePerfilRequest extends FormRequest
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
     *
     * @return array
     */
    public function rules()
    {
        return [
            "cedula_per" => ["required", "integer", new cedula, "unique:perfils"],
            "apellido_per" => "required",
            "nombre_per" => "required",
            "f_nacimiento_per" => "date",
            "correo_per" => "required|email|unique:perfils",
            "contrasenia_per" => "required",
            "re_contrasenia_per" => "required|same:contrasenia_per",
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
