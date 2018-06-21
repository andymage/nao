<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PedidosRequest extends FormRequest
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
        $rules = [];
        foreach ($this->request->get('Productos')['id_tela'] as $key => $value) {
            $rules['Productos.id_tela.' . $key] = 'required|exists:telas_cliente,id';
        }
        foreach ($this->request->get('Productos')['kg_programar'] as $key => $value) {
            $rules['Productos.kg_programar.' . $key] = 'required|numeric';
        }
        foreach ($this->request->get('Productos')['piezas'] as $key => $value) {
            $rules['Productos.piezas.' . $key] = 'required';
        }
        $rules['id_cliente'] = 'required|exists:clientes,id';
        $rules['fecha'] = 'required';
        return $rules;
    }

    public function attributes(){
        $attributes = [];
        foreach ($this->request->get('Productos')['id_tela'] as $key => $value) {
            $attributes['id_tela.' . $key] = 'Modelo Tela ' . ($key + 1);
        }
        foreach ($this->request->get('Productos')['kg_programar'] as $key => $value) {
            $attributes['kg_programar.' . $key] = 'Kilos a Programar ' . ($key + 1);
        }
        foreach ($this->request->get('Productos')['piezas'] as $key => $value) {
            $attributes['piezas.' . $key] = 'Piezas Rec ' . ($key + 1);
        }
        return $attributes;
    }
}
