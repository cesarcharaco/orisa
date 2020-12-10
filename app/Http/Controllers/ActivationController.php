<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\User;
use Sentinel;

class ActivationController extends Controller
{
    public function activate($id, $code)
    {   
        $user = Sentinel::findById($id);

        if(\Activation::complete($user, $code))
        {
        	Flash::success('Felicidades cuenta activada exitosamente ahora puede iniciar sesión.');

            return redirect('iniciarsesion');
        }
    }
}
