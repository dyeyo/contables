<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrassaccionesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'numeroDoc'=>'unique:transacciones',
            'codigoPresupuesto'=>'unique:transacciones',
            'anio;'=>'->nullable',
            'mes;'=>'->nullable',
            'dia;'=>'->nullable',
            'valortransaccion;'=>'->nullable',
            'valorBase;'=>'->nullable',
            'revelacion;'=>'->nullable',
            'tercero_id;'=>'->nullable',
            'comprobante_id;'=>'->nullable',
            'tipoPresupuesto_id;'=>'->nullable',
            'detalle;'=>'->nullable',
            'plantilla;'=>'->nullable',
            'totalDebito;'=>'->nullable',
            'totalCredito;'=>'->nullable',
            'diferencia;'=>'->nullable',
            'tipoPago;'=>'->nullable',
            '->transacciones_id'=>'->nullable',
            'codigoPUC,'=>'->nullable',
            'docReferencia,'=>'->nullable',
            'coNoCo,'=>'->nullable',
            'debito,'=>'->nullable',
            'credito,'=>'->nullable',
            'base,'=>'->nullable',
            'nota,'=>'->nullable',
            'valorRetenido,'=>'->nullable',
            'codigoNIIIF,'=>'->nullable',
            //
        ];
    }

    public function messages()
    {
        return [
            'numeroDoc.unique' =>'El Número de documento ya fue registrado.',
            'codigoPresupuesto.unique' =>'El Código de Presupuesto ya fue registrado.'
        ];
    }
}
