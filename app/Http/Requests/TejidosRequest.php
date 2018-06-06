<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TejidosRequest extends FormRequest
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
            'tejido' => 'required',
            'modelo' => 'required',
            'cve_tejido' => 'required|min:1|max:1|regex:/^[a-zA-Z]+$/',
        ];
    }

    public function attributes(){
        return [
            'tejido' => 'Tejido',
            'modelo' => 'Modelo',
            'cve_tejido' => 'Cve Tejido'
        ];
    }
}
