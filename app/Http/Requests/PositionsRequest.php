<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PositionsRequest extends Request
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
            'codigo'    => 'required|unique:positions|alpha_dash',
            'nombre'    => 'required|unique:positions||regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'salario'   =>  'required|digits_between:4,10',
        ];
    }
}
