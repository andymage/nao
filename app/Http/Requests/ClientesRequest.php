<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ClientesRequest extends FormRequest
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
            'clave_corta' => 'required|min:2|max:2|unique:proveedores,clave_corta',
            'direccion' => 'required',
            'email' => 'email'
        ];
    }

    public function attributes(){
        return [
            'nombre' => 'Nombre',
            'clave_corta' => 'Clave Corta',
            'direccion' => 'Dirección',
            'email' => 'E-mail'
        ];
    }
}
