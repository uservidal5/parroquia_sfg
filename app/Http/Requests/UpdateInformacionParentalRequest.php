<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInformacionParentalRequest extends FormRequest
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
            "nombre_inf" => "required_if:estado_inf,1|nullable|regex:/^[\pL\s\-]+$/u|max:255",
            "apellido_inf" => "required_if:estado_inf,1|nullable|regex:/^[\pL\s\-]+$/u|max:255",
            "celular_inf" => "required_if:estado_inf,1|nullable|numeric",
        ];
    }
    public function messages()
    {
        # code...
        return [
            "required_if" => "Campo obligatorio",
            "regex" => "Ingrese solo letras",
            "numeric" => "Ingrese solo numeros",
            "max" => "No debe superar los 255 caracteres",
            "celular_inf.numeric" => "No es un número de teléfono",
        ];
    }
}
