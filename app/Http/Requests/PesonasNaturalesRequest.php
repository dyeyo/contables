<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PesonasNaturalesRequest extends FormRequest
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

    public function rules($id=0, $merge=[])
    {
        return array_merge([
            'numeroDocumento'=>'required|unique:personas_naturales',
            'nombre1'=>'required',
            'apellido1'=>'required',
            'id_tipoDocumento'=>'required',
        ],
        $merge);
    }

    public function messages()
    {
        return [
            'numeroDocumento.required' => 'El campo Numero de Documento es obligatorio.',
            'numeroDocumento.unique' =>'El Numero de Documento que digitaste ya fue registrado.',
            'nombre1.required' => 'El campo Primer Nombre es obligatorio.',
            'apellido1.required' => 'El campo Primer Apellido es obligatorio.',
            'id_tipoDocumento.required' => 'El campo Tipo de Identificacion es obligatorio.',
        ];
    }
}
