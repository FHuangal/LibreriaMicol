<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        'nombre'=>'string|required|max:255',
        'dni'=>'string|required|unique:clientes|min:8|max:8',
        'ruc'=>'nullable|string|unique:clientes|min:11|max:11',
        'direccion'=>'nullable|string|max:255',
        'telefono'=>'string|required|unique:clientes|min:9|max:9',
        'email'=>'string|nullable|unique:clientes|max:255|email:rfc,dns',
        ];
    }
    
    public function messages()
    {
        return[

        'nombre.string'=>'El valor no es correcto.',
        'nombre.required'=>'Este campo es requerido.', 
        'nombre.max'=>'Solo se permite 255 caracteres.',

        'dni.string'=>'El valor no es correcto.',
        'dni.required'=>'Este campo es requerido.', 
        'dni.unique'=>'Este DNI ya se encuentra registrado.',
        'dni.min'=>'Se requiere de 8 caracteres.',
        'dni.max'=>'Solo se permite 8 caracteres.',

        'ruc.string'=>'El valor no es correcto.',
        'ruc.unique'=>'El numero de RUC ya se encuentra registrado.',
        'ruc.min'=>'Se requiere de 11 caracteres.',
        'ruc.max'=>'Solo se permite 11 caracteres.',

        'direccion.string'=>'El valor no es correcto.',
        'direccion.max'=>'Solo se permite 255 caracteres.',

        'telefono.string'=>'El valor no es correcto.',
        'telefono.unique'=>'El numero de celular ya se encuentra registrado.',
        'telefono.min'=>'Se requiere de 9 caracteres.',
        'telefono.max'=>'Solo se permite 9 caracteres.',

        'email.string'=>'El valor no es correcto.',
        'email.unique'=>'La direccion de correo electronico ya se encuentra registrado.',
        'email.max'=>'Solo se permite 255 caracteres.',
        'email.email'=>'No es un correo electronico.',

        ];
    }
}
