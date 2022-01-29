<?php

namespace App\Http\Requests\Proveedor;

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
            'nombre'=>'required|string|max:255',
            'email'=>'required|email|string|max:200|unique:proveedors',
            'ruc'=>'required|string|max:11|min:10|unique:proveedors',
            'direccion'=>'nullable|string|max:255',
            'telefono'=>'required|string|max:9|min:9|unique:proveedors',
        ];
    }

    public function messages()
    {
        return[
        'nombre.required'=>'El campo nombre es requerido.',
        'nombre.string'=>'El valor no es correcto.',
        'nombre.max'=>'Solo se permite 255 caracteres.',

        'email.required'=>'El campo email es requerido.',
        'email.email'=>'No es un correo electronico.',
        'email.string'=>'El valor no es correcto.',
        'email.max'=>'Solo se permite 255 caracteres.',
        'email.unique'=>'Ya se encuentra registrado.',

        'ruc.required'=>'Este campo es requerido.',
        'ruc.string'=>'El valor no es correcto.',
        'ruc.max'=>'Solo se permiten 11 caracteres.',
        'ruc.min'=>'Se requiere de 10 caracteres.',
        'ruc.unique'=>'Ya se encuentra registrado.',

        'direccion.max'=>'Solo se permiten 255 caracteres.',
        'direccion.string'=>'El valor no es correcto.',

        'telefono.required'=>'Este campo es requerido.',
        'telefono.string'=>'El valor no es correcto.',
        'telefono.max'=>'Solo se permiten 9 caracteres.',
        'telefono.min'=>'Se requiere de 9 caracteres.',
        'telefono.unique'=>'Ya se encuentra registrado.',

        ];
    }
}
