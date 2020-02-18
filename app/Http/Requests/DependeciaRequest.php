<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DependeciaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'codigo'=>'required|unique:dependencias',
        ];

    }

    public function messages()
    {
        return [
            'codigo.required' => 'El campo CODIGO es obligatorio.',
            'codigo.unique' =>'El campo CODIGO que digitaste ya fue registrado.'
        ];
    }
}
