<?php

namespace App\Http\Requests;

use App\Puc;
use Illuminate\Foundation\Http\FormRequest;

class CuentaRequest extends FormRequest
{
    protected $cuenta;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
            return [
                'codigoCuenta' => 'unique:pucs',
                'CuentaCoNC' => 'required',
            ];
    }

    public function messages()
    {
        return [
            'codigoCuenta.unique' => 'El codigo de la cuenta ya esta asignada',
            'CuentaCoNC.required' => 'El tipo de la cuenta es obligatorio'
        ];
    }
}
