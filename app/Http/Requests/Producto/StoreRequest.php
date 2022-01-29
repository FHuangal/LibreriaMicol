<?php

namespace App\Http\Requests\Producto;

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
            'nombre'=>'string|required|unique:productos|max:255',
            //|dimensions:min_width=100,min_height=200
            'precio_venta'=>'required',
            'category_id'=>'integer|required|exists:App\Models\Category,id',
            'proveedor_id'=>'integer|required|exists:App\Models\Proveedor,id',
        ];
    }
    public function messages()
    {
        return[

        'nombre.string'=>'El valor no es correcto.',
        'nombre.required'=>'Este campo es requerido.',        
        'nombre.unique'=>'El producto ya esta regstrado.',
        'nombre.max'=>'Solo se permite 255 caracteres.',
        
        'precio_venta.required'=>'Este campo es requerido.',

        'category_id.integer'=>'El valor tiene que ser entero.',
        'category_id.required'=>'Este campo es requerido.', 
        'category_id.exists'=>'La categoria no existe.',
        
        'proveedor_id.integer'=>'El valor tiene que ser entero.',
        'proveedor_id.required'=>'Este campo es requerido.', 
        'proveedor_id.exists'=>'El proveedor no existe.',

        ];
    }
}
