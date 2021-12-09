<?php

namespace App\Http\Requests\Producto;

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
            'nombre'=>'string|required|unique:productos,nombre,'.
            $this->route('producto')->id.'|max:255',
            'precio_venta'=>'required',
        ];
    }
    public function messages()
    {
        return[

        'nombre.string'=>'El valor no es correcto.',
        'nombre.required'=>'El campo nombre es requerido.',        
        'nombre.unique'=>'El producto ya esta regstrado.',
        'nombre.max'=>'Solo se permite 255 caracteres.',
        
        'precio_venta.required'=>'El campo precio_venta es requerido.',
        ];
    }
}
