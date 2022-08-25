<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCursoRequest extends FormRequest
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
            "nombre_cur" => "required",
            "fecha_inicio_cur" => "required",
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
            "max" => "No debe superar los 255 caracteres",
            "regex" => "Ingrese solo letras",
            "numeric" => "Ingrese solo numeros"
        ];
    }
}
