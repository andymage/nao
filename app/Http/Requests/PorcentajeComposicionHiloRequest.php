<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PorcentajeComposicionHiloRequest extends FormRequest
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
            'id_material' => 'required|exists:materiales,id',
            'porcentaje' => 'required|numeric',
        ];
    }

    public function attributes(){
        return [
            'id_material' => 'Id Material',
            'porcentaje' => 'Porcentaje'
        ];
    }
}
