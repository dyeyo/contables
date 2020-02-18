<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaJuridicaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nit'=>'required|unique:personas_juridicas',
            'raz_social'=>'required',
        ];

    }

    public function messages()
    {
        return [
            'nit.required' => 'El campo NIT es obligatorio.',
            'nit.unique' =>'El campo NIT que digitaste ya fue registrado.',
            'raz_social.required' => 'El campo Razon Social es obligatorio.',
        ];
    }
}
