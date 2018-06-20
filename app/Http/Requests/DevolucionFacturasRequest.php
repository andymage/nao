<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class DevolucionFacturasRequest extends FormRequest
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
            'id_factura' => 'required|exists:facturas,id',
            'kg_dev' => 'required|numeric',
            'importe' => 'required|numeric',
            'fecha' => 'required',
        ];
    }

    public function attributes(){
        return [
            'id_proveedor' => 'Proveedor',
            'id_hilo' => 'Hilo',
            'numero_factura' => 'Número Factura',
            'kg_hilo' => 'Kgs Hilo',
            'lote_hilo' => 'Lote Hilo',
            'fecha' => 'Fecha',
        ];
    }
}
