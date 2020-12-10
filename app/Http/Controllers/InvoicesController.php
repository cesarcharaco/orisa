<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Command;
use Carbon\Carbon;
use App\Http\Requests;
use PDF;

class InvoicesController extends Controller
{
    public function index(){

    }

    public function movimiento()
    {
      $date = Carbon::now()->format('Y-m-d');
      $facturas = Invoice::where('created_at', 'LIKE', $date." %")->get();

      // dd($facturas);

      return view('admin.invoice.movimiento',compact('facturas'));
    }

    public function pdf($id)
    {
    	$comanda = Command::find($id);

        $cliente = $comanda->client->first();

        $mesa = $comanda->table()->get();

        $platos = $comanda->plates()->get();
        $tragos = $comanda->beverages()->get();
        $bebidas = $comanda->drinks()->get();
        $jugos = $comanda->juices()->get();

        $total_p = 0;
        $total_j = 0;
        $total_b = 0;
        $total_t = 0;

        foreach ($platos as $key => $value) {
            $total_p = $value->precio+$total_p;
        }

        foreach ($tragos as $key => $value) {
            $total_t = $value->precio+$total_t;
        }

        foreach ($bebidas as $key => $value) {
            $total_b = $value->precio+$total_b;
        }

        foreach ($jugos as $key => $value) {
            $total_j = $value->precio+$total_j;
        }
        $subtotal = $total_t + $total_j + $total_p + $total_b;
        $iva = $subtotal * 0.12;
        $servicio = $subtotal * 0.05;

        $total = $subtotal + $iva + $servicio;

        $pdf = PDF::loadView('admin.comandas.factura', ['comanda'=> $comanda, 'platos' => $platos, 'tragos' => $tragos, 'bebidas' => $bebidas, 'jugos' => $jugos, 'subtotal' => $subtotal, 'iva' => $iva, 'total' => $total, 'mesa' => $mesa, 'cliente' => $cliente, 'servicio' => $servicio]);

        	return $pdf->stream();
        // return view('admin.comandas.recibo', compact('comanda', 'platos', 'tragos', 'bebidas', 'jugos', 'subtotal', 'iva', 'servicio', 'total', 'mesa', 'cliente'));
    }

}
