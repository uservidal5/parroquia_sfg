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
            "cedula_per" => ["required", "digits:10", new cedula, "unique:perfils"],
            "apellido_per" => "required|regex:/^[\pL\s\-\.]+$/u|max:255",
            "nombre_per" => "required|regex:/^[\pL\s\-\.]+$/u|max:255",
            "f_nacimiento_per" => "date",
            "correo_per" => "required|email|unique:perfils|max:255",
            "contrasenia_per" => "required|max:255",
            "re_contrasenia_per" => "required|same:contrasenia_per",
            "tipo_representante_per" => "required",
            "telefono_representante_per" => "required|max:10",
        ];
    }
    public function messages()
    {
        return [
            "required" => "Campo obligatorio",
            "cedula_per.digits" => "Cédula solo debe contener números.",
            "cedula_per.unique" => "Cédula ya registrada.",
            "re_contrasenia_per.same" => "Las contraseñas no coinciden.",
            "correo_per.unique" => "Correo Electrónico ya registrado.",
            "regex" => "Ingrese solo letras",
            "max" => "No debe superar los 255 caracteres",
        ];
    }
}
