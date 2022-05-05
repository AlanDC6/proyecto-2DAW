<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarDetalles_pedidoRequest extends FormRequest
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
            'nombre' => 'required',
            'apellidos' => 'required',
            'pais' => 'required',
            'ciudad' => 'required',
            'codigo_postal' => 'required',
            'direccion_calle' => 'required',
            'direccion2' => 'required',
            'telefono' => 'required',
            'email' => 'required',
        ];
    }
}
