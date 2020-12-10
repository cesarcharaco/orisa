<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditProviderRequest extends Request
{
    function __construct(Route $route)
    {
        $this->route = $route;
    }

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
            'razon_social' => 'max:100|required',
            'telefono'     => 'required|digits:7',
            'correo'       => 'email|unique:providers,correo,'. $this->route->getParameter('proveedores')
        ];
    }
}
