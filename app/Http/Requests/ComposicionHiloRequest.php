<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ComposicionHiloRequest extends FormRequest
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
            'cve_corta_composicion' => 'required|numeric|digits_between:1,1',
        ];
    }

    public function attributes(){
        return [
            'cve_corta_composicion' => 'Cve Corta Composicion',
        ];
    }
}
