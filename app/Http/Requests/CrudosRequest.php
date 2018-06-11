<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CrudosRequest extends FormRequest
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
            'id_clave_hilo' => 'required|exists:claves_hilos,id',
            'id_maquina_circular' => 'required|exists:maquinas_circulares,id',
            'gramaje' => 'required|numeric',
            'lm' => 'required',
            'draw' => 'required',
            'kg_rollo' => 'required|numeric',
        ];
    }

    public function attributes(){
        return [
           'id_clave_hilo' => 'Cve Corta Calibre',
           'id_maquina_circular' => 'Máquina',
           'gramaje' => 'Gramaje',
           'lm' => 'L.M.',
           'draw' => 'DRAW',
           'kg_rollo' => 'Kgs por rollos',
        ];
    }
}
