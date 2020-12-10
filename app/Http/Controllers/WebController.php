<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Reservation;
use App\Portal;
use Sentinel;

use App\Http\Requests;

class WebController extends Controller
{
	public function index()
	{
		$user = Sentinel::getUser();
        $client = Client::where('correo', $user->email)->first();
        $reservaciones = Reservation::where('client_id', $client->id)->get();
        $portal = Portal::where('estatus', true)->first();
	    $platos = (empty($portal) === false) ? $platos = $portal->plates()->get() : [];

        return view('client.index', compact('platos', 'reservaciones'));
	}

	public function createReservations()
	{
		return view('client.create');
	}
}
