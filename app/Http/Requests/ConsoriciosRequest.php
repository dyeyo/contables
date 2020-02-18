<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsoriciosRequest extends FormRequest
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
            'persona_id'=>'required|unique:',
        ];
    }

    public function messages()
    {
        return [
            'codigo.unique' =>'El Tercero ya fue registrado.'
        ];
    }
}
