<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Provider;
use Laracasts\Flash\Flash;
use App\Http\Requests\ProviderRequest;
use App\Http\Requests\EditProviderRequest;


class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::all();

        return view('admin.providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rif = $request->literal.$request->rif;
        $exist = Provider::where('rif', $rif)->exists();
        
        if($exist)
        {
            Flash::warning('<strong> Alerta </strong> busqueda con número de rif <strong>'. $rif .'</strong> se encuentra en la base de datos.');

            return redirect()->back();

        }else{

            Flash::info('<strong> INFO </strong> búsqueda con número de Rif <strong>'.$rif.'</strong> no se encuentra en la base de datos, proceda a llenar los campos.');

            return view('admin.providers.create', compact('rif'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderRequest $request)
    {
        $provider = new Provider();
        $provider->rif = ucwords(strtolower($request->rif));
        $provider->razon_social = ucwords(strtolower($request->razon_social));
        $provider->ciudad = ucwords(strtolower($request->ciudad));
        $provider->calle = ucwords(strtolower($request->calle));
        $provider->habitacion = ucwords(strtolower($request->habitacion));
        $provider->operadora = $request->operadora;
        $provider->telefono = $request->telefono;
        $provider->correo = strtolower($request->correo);
        $provider->save();

        Flash::success('<strong> Éxito </strong> se ha registrado un nuevo proveedor <em>'. $provider->razon_social.'</em> correctamente.');

        return redirect('admin/proveedores');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider = Provider::findOrFail($id);
        $rif = false;

        return view('admin.providers.show', compact('provider', 'rif'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provider = Provider::findOrFail($id);

        $rif = false;

        return view('admin.providers.edit', compact('provider', 'rif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProviderRequest $request, $id)
    {
        $provider = Provider::findOrFail($id);
       
        $provider->fill($request->all());
        $provider->save();

        Flash::success('<strong> Éxito </strong> se ha actualizado el proveedor <em>'.$provider->razon_social.'</em> correctamente.');

        return redirect('admin/proveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $provider = Provider::find($request->id);
        $provider->delete();

        Flash::success('<strong>Éxito</strong> '. $provider->razon_social .' el proveedor se eliminó correctamente');

        return redirect('admin/proveedores');
    }


    public function search(Request $request)
    {
        return view('admin.providers.search');
    }


    public function print($id)
    {

        $proveedor = Provider::find($id);

        $pdf =  \PDF::loadView('admin.providers.pdf.individual', ['proveedor' => $proveedor]);
        
        return $pdf->stream();
    }

    public function printList()
    {
        $proveedores = Provider::all();

        $pdf =  \PDF::loadView('admin.providers.pdf.listado', ['proveedores' => $proveedores]);

        return $pdf->stream();        
    }

}