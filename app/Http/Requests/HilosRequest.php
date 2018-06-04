<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class HilosRequest extends FormRequest
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
            'calibre' => 'required|numeric',
            'cve_corta_hilo' => 'required|min:1|max:1|regex:/^[a-zA-Z]+$/',
        ];
    }

    public function attributes(){
        return [
            'calibre' => 'Calibre',
            'cve_corta_hilo' => 'Cve Corta Hilo',
        ];
    }
}
