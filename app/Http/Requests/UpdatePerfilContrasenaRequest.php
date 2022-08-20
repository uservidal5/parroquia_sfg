<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePerfilContrasenaRequest extends FormRequest
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
            "contrasenia_per" => "required|max:255",
            "re_contrasenia_per" => "required|same:contrasenia_per"
        ];
    }
    public function messages()
    {
        return [
            //
            "required" => "Campo obligatorio",
            "same" => "Lasc contraseñas no coinciden",
            "max" => "No debe ser mayor que 255 caracteres",
        ];
    }
}
