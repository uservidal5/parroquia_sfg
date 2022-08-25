<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCursoRequest extends FormRequest
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
            //
            "fecha_inicio_cur" => "required",
            "nombre_cur" => "required",
            "responsable_cur" => "nullable|regex:/^[\pL\s\-\.]+$/u|max:255",
            "costo_cur" => "nullable|numeric|min:0",
        ];
    }
    public function messages()
    {
        return [
            //
            "required" => "Campo obligatorio",
            "min" => "Debe ser mayor a 0",
            "regex" => "Ingrese solo letras",
            "numeric" => "Ingrese solo numeros",
            "max" => "No debe superar los 255 caracteres",
        ];
    }
}
