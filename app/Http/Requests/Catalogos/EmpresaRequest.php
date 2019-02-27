<?php

namespace App\Http\Requests\Catalogos;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
        $rule=optional($this->empresa)->emp_id;
        $except=isset($rule)?(','.$rule.',emp_id'):'';
        return [
            'emp_nombre'=>'required|max:20|string',
            'emp_direccion'=>'required|max:50|string',
            'emp_telefono'=>'required|numeric',
            'emp_email'=>"required|email|unique:mysql.empresa,emp_email".$except,

        ];
    }


    public function attributes(){
        return[
            'emp_email'=>'correo electronico',
            'emp_direccion'=>'direccion',
            'emp_telefono'=>'telefono',
            'emp_nombre'=>'nombre'
        ];
    }

    public function messages(){
         return[
            'emp_email.unique'=>'correo electronico no disponible',
        ];
    }
}
