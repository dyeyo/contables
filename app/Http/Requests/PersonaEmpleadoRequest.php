<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaEmpleadoRequest extends FormRequest
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
            'numeroDocumento'=>'required|unique:personas_empleados',
            'foto'=>'mimes:jpg,jpeg,bmp,png',
        ],
            $merge);
    }
    public function messages()
    {
        return [
            'numeroDocumento.required' => 'El campo Numero de Documento es obligatorio.',
            'numeroDocumento.unique' =>'El Numero de Documento que digitaste ya fue registrado.',
            //'foto.required' => 'El campo Foto  es obligatorio.',
            'foto.mimes' => 'El campo Foto solo acepta formato jpg, jpeg, bmp, png.',
        ];
    }
}
