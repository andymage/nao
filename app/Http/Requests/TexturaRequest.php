<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TexturaRequest extends FormRequest
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
            'textura' => 'required',
            'color' => 'required',
            'cve_corta_textura' => 'required|min:1|max:1|regex:/^[a-zA-Z]+$/',
        ];
    }

    public function attributes(){
        return [
            'cve_corta_textura' => 'Cve Corta Textura',
            'textura' => 'Textura',
            'color' => 'Color'
        ];
    }
}
