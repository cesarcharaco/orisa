<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cestaticket;

use Laracasts\Flash\Flash;

class CestaticketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cestaticket = Cestaticket::first();
        $indice = 1;

        return view('admin.cestaticket.index', compact('cestaticket', 'indice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cestaticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cestaticket = Cestaticket::create($request->all())->save();

        Flash::success('<strong> Exito </strong> se ha creado un nuevo valor para la unidad triburaria exitosamente.');

        return redirect('admin/cestaticket');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cestaticket = Cestaticket::find($id);

        return view('admin.cestaticket.edit', compact('cestaticket'));
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
        $cestaticket = Cestaticket::find($id);
        $cestaticket->fill($request->all())->save();

        Flash::success('<strong> Exito </strong> se ha actualizado el valor de la unidad triburaria exitosamente.');

        return redirect('admin/cestaticket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
