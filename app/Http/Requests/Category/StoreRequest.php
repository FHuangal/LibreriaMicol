<?php

namespace App\Http\Requests\Category;

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
            'nombre'=>'required|string|max:50',
            'descripcion'=>'nullable|string|max:255',
        ];
    }
    public function messages()
    {
        return[
        'nombre.required'=>'El campo nombre es requerido.',
        'nombre.string'=>'El valor para nombre no es correcto.',
        'nombre.max'=>'Solo se permite 50 caracteres como nombre.',
        'descripcion.string'=>'El valor para descripcion no es correcto.',
        'descripcion.max'=>'Solo se permite 255 caracteres como descripcion.',
        ];
    }

}
