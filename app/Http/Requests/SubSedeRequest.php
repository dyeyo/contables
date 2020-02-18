<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubSedeRequest extends FormRequest
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
            'codigoCC'=>'required|unique:sub_sedes',
        ];
    }

    public function messages()
    {
        return [
            'codigoCC.required' => 'El campo Código del Centro de Costo es obligatorio.',
            'codigoCC.unique' =>'El campo Código del Centro de Costo que digitaste ya existe, por favor prueba otro.'
        ];
    }
}
