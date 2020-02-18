<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImporteRequest extends FormRequest
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
            'numeroDocumento'=>'unique:personas_empleados',
        ];
    }

    public function messages()
    {
        return [
            'numeroDocumento.unique' =>'Un número de Documento ya fue registrado y no puede etar duplicado por favor verifica tu excel.',
        ];
    }
}
