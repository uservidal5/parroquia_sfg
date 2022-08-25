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
    public function rules()
    {
        $id = $this->input('id');
        return [
            "cedula_per" => ["required", "integer", new cedula, "unique:perfils,cedula_per," . $id],
            "apellido_per" => "required|regex:/^[\pL\s\-\.]+$/u|max:255",
            "nombre_per" => "required|regex:/^[\pL\s\-\.]+$/u|max:255",
            "f_nacimiento_per" => "date|before_or_equal:" . date("d-m-Y"),
            "correo_per" => ["required", "email", "unique:perfils,correo_per," . $id],
            "tipo_representante_per" => "required",
            "telefono_representante_per" => "required|digits:10",
        ];
    }
    public function messages()
    {
        return [
            "before_or_equal" => "Fecha inválida",
            "required" => "Campo obligatorio",
            "cedula_per.integer" => "Cédula solo debe contener números.",
            "cedula_per.unique" => "Cédula ya registrada.",
            "re_contrasenia_per.same" => "Las contraseñas no coinciden.",
            "correo_per.unique" => "Correo Electrónico ya registrado.",
            "regex" => "Ingrese solo letras",
            "max" => "No debe superar los 255 caracteres",
            "telefono_representante_per.digits" => "No debe superar los 10 caracteres",
        ];
    }
}
