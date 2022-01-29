<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'documento'=>'string|required|min:8|max:11',
            'direccion'=>'nullable|string|max:255',
            'telefono'=>'string|required|min:9|max:9',
            'email'=>'string|nullable|max:255|email:rfc,dns',
            ];
        }
        
        public function messages()
        {
            return[
    
            'nombre.string'=>'El valor no es correcto.',
            'nombre.required'=>'Este campo es requerido.', 
            'nombre.max'=>'Solo se permite 255 caracteres.',
    
            'documento.string'=>'El valor no es correcto.',
            'documento.required'=>'Este campo es requerido.', 
            'documento.unique'=>'Este documento ya se encuentra registrado.',
            'documento.min'=>'Se requiere de 8 caracteres.',
            'documento.max'=>'Solo se permite 11 caracteres.',
    
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
