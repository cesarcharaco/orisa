<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProviderRequest extends Request
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
            'rif'          => 'required|unique:providers',
            'razon_social' => 'max:100|required',
            'telefono'     => 'required|digits:7',
            'correo'       => 'email|unique:providers,correo',
        ];
    }

}
