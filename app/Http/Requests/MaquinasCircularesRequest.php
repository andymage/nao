<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class MaquinasCircularesRequest extends FormRequest
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
            'agujas' => 'required|integer',
            'alimentadores' => 'required|integer',
            'rpm' => 'required|numeric',
            'galga' => 'required|numeric',
            'maquina' => 'required',
        ];
    }

    public function attributes(){
        return [
            'agujas' => 'Agujas',
            'alimentadores' => 'Alimentadores',
            'rpm' => 'RPM',
            'galga' => 'Galga',
            'maquina' => 'Máquina',
        ];
    }
}
