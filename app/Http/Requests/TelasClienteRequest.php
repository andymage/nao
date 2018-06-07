<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TelasClienteRequest extends FormRequest
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
            'id_tejido' => 'required|exists:tejidos,id',
            'id_composicion_hilo' => 'required|exists:composicion_hilo,id',
            'id_textura' => 'required|exists:texturas,id',
            'diametro' => 'required|numeric',
            'gramaje' => 'required|numeric',
        ];
    }

    public function attributes(){
        return [
            'id_tejido' => 'Id Tejido',
            'id_composicion_hilo' => 'Id Composicion Hilo',
            'id_textura' => 'Id Textura',
            'diametro' => 'Diámetro',
            'gramaje' => 'Gramaje',
            'descripcion' => 'Descripción',
        ];
    }
}
