<?php

namespace App\Http\Requests\Catalogos;

use Illuminate\Foundation\Http\FormRequest;

class ContactoRequest extends FormRequest
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
           'prv_id'=>'required|exists:proveedor,prv_id',
            'con_nombre'=>'required|string|max:20',
            'con_apellido'=>'required|string|max:20',
            'con_cargo'=>'required|string|max:50',
            'con_departamento'=>'required|string|max:50',
            'con_email'=>'required|email|max:60',
            'con_telefono'=>'required|numeric',     
            'con_extension'=>'required|numeric'
        ];
    }
}
