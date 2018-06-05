<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ClavesHilosRequest extends FormRequest
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
            'id_hilo' => 'required|exists:hilos,id',
            'id_composicion_hilo' => 'required|exists:composicion_hilo,id',
            'id_textura' => 'required|exists:texturas,id'
        ];
    }

    public function attributes(){
        return [
            'id_hilo' => 'Id Hilo',
            'id_composicion_hilo' => 'Id Composicion Hilo',
            'id_textura' => 'Id Textura'
        ];
    }
}
