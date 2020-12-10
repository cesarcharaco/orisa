<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Liqueur;
use App\Provider;
use App\Unit;
use App\Liqueurs_type;
use App\Http\Requests;
use App\Http\Requests\LiqueurRequest;
use Laracasts\Flash\Flash;
use Response;

class LiqueursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liqueurs = Liqueur::all();

        return view('admin.liqueurs.index', compact('liqueurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $providers = Provider::lists('razon_social', 'id');
        $liqueurs_types = Liqueurs_type::lists('tipo_licor', 'id');
        $units = Unit::lists( 'unidad', 'id');


        return view('admin.liqueurs.create', compact('units', 'liqueurs_types', 'providers'));
    }

    public function getLiqueurs($type)
    {
        $liqueur = Liqueur::where('type_id', $type)->get();
        
        return Response::json($liqueur);
    }

    public function addLiqueur($id_l)
    {
        $liqueur = Liqueur::where('id', $id_l)->get();

        $units = Unit::all();

        return Response::json(array('liqueur' => $liqueur, 'units' => $units));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LiqueurRequest $request)
    {

        $liqueur = Liqueur::create($request->all());
        $liqueur->save();

        foreach($request->id_providers as $provider)
        {
            $liqueur->providers()->attach($provider);
        }

        bitacora('Registro el licor', $liqueur->licor, $liqueur->id);

        Flash::success('<strong> Éxito </strong> a registrado un nuevo licor <em>'.$liqueur->licor.'</em> correctamente.');

        return redirect('admin/licores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $liqueur = Liqueur::findOrFail($id);
        $liqueurs_types = Liqueurs_type::lists('tipo_licor', 'id');
        $units = Unit::lists( 'unidad', 'id');

        $providers = false;


        return view('admin.liqueurs.show', compact('liqueur', 'providers', 'liqueurs_types', 'units'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $liqueur = Liqueur::findOrFail($id);
        $liqueurs_types = Liqueurs_type::lists('tipo_licor', 'id');
        $units = Unit::lists( 'unidad', 'id');

        $providers = false;


        return view('admin.liqueurs.edit', compact('liqueur', 'providers', 'liqueurs_types', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LiqueurRequest $request, $id)
    {
        $liqueur = Liqueur::findOrFail($id);

        $liqueur->fill($request->all())->save();

        bitacora('Edito el licor', $liqueur->licor, $liqueur->id);

        Flash::success('<strong>Éxito</strong> el licor '. $liqueur->licor. ' se modifico correctamente');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $liqueur = Liqueur::find($id);
        $liqueur->delete();

        Flash::success('<strong> Éxito </strong> el licor '. $liqueur->licor .' se eliminó correctamente');

        return redirect('admin/licores');
    }
}
