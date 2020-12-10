<?php

namespace App\Http\Controllers;

use App\Client;
use App\Command;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Response;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('admin.clients.index', compact('clients'));
    }

    public function getClient($cedula)
    {
        $client = App\Client::where('dni_cedula', $cedula)->get();
        
        return Response::json($client);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dni_cedula = $request->literal.$request->cedula;

        $exist = Client::where('dni_cedula', $dni_cedula)->exists();

        if($exist)
        {
            Flash::warning('<strong> Alerta </strong> el número de cédula ya se encuentra registrado <strong>'. $dni_cedula .'</strong> se encuentra en la base de datos.');

            return redirect()->back();

        }else{

            Flash::info('<strong> INFO </strong> búsqueda con número de cédula '. $dni_cedula .' no se encuentra en la base de datos, proceda a llenar los campos.');

            return view('admin.clients.create', compact('dni_cedula'));

        }

    }

    public function search(Request $request)
    {
        return view('admin.clients.search');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->comanda){
            $client = new Client($request->all());
            $client->direccion = $request->ciudad . ' Av/C. ' .$request->calle . ' ' . $request->habitacion;
            $client->save();

           $comanda = Command::find($request->comanda);
            $fecha = new Carbon($comanda->create_at);
            $fecha = $fecha->format('d-m-Y');

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
            $date = new Carbon($comanda->create_at);
            $total = $subtotal + $iva + $servicio;

            return view('admin.comandas.invoice-client', compact('comanda', 'platos', 'tragos', 'bebidas', 'jugos', 'date', 'subtotal', 'iva', 'servicio', 'total', 'mesa', 'fecha', 'client'));

        }else{
            
            $client = new Client($request->all());
            $client->direccion = $request->cuidad . ' ' . $request->calle . ' ' . $request->habitacion;
            $client->save();

            bitacora('Registro el cliente', $client->nombre, $client->id);
            Flash::success('<strong>Éxito </strong> Se ha registrado el cliente '. $client->nombre. ' correctamente');

            return redirect('admin/clientes');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);


        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $dni_cedula = false;
        return view('admin.clients.edit', compact('client', 'dni_cedula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $client->fill($request->all());
        $client->direccion = $request->ciudad . ' Av/C. ' .$request->calle . ' ' . $request->habitacion;
        $client->save();

        bitacora('Edito el cliente', $client->nombre, $client->id);

        Flash::success('<strong>Éxito </strong> '. $client->nombre. ' se modifico correctamente');


        return redirect('admin/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $client = Client::findOrFail($request->id);

        $client->delete();

        Flash::success('<strong> Éxito </strong> se ha eliminado el cliente');

        return redirect()->back();
    }


    public function print($id)
    {

        $cliente = Client::find($id);

        $pdf =  \PDF::loadView('admin.clients.pdf.individual', ['cliente' => $cliente]);
        
        return $pdf->stream();
    }

    public function printList()
    {
        $clientes = Client::all();

        $pdf =  \PDF::loadView('admin.clients.pdf.listado', ['clientes' => $clientes]);

        return $pdf->stream();        
    }

}
