<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Additional;
use App\Employee;
use App\Payroll;

use Laracasts\Flash\Flash;

class AdditionalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adicionales = Additional::orderBy('id', 'DESC')->get()->take(50);
        $indice = 0;

        return view('admin.additionals.index', compact('adicionales', 'indice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prenominas = Payroll::orderBy('id', 'DESC')->where('est', '0')->get()->take(5);

        if(count($prenominas) == 0)
        {

            Flash::warning('<strong> Alerta </strong> no se encontro ningúna prenomina registrada recientemente.');

            return redirect()->back();

        } else {

            return view('admin.additionals.create', compact('prenominas'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adicional = new Additional();
        $adicional->nombre       = $request->nombre;
        $adicional->descripcion  = $request->descripcion;
        $adicional->modo_pago    = $request->modo_pago;
        $adicional->monto        = $request->valor;
        $adicional->tipo         = $request->tipo;
        $adicional->id_prenomina = $request->prenomina;
        $adicional->save();

        if($adicional->tipo == 'A')
        {
            Flash::success('<strong> Éxito </strong> se ha creado una nueva asignación correctamente.');

            return redirect('admin/adicionales');

        } else {

            Flash::success('<strong> Éxito </strong> se ha creado una nueva deducción correctamente.');

            return redirect('admin/adicionales');
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
        $adicionales = Additional::find($id);
        $prenominas = Payroll::orderBy('id', 'DESC')->where('est', '0')->get()->take(5);

        return view('admin.additionals.edit', compact('adicionales', 'prenominas'));
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
        $adicionales = Additional::find($id);

        $newAdicionales = $adicionales->fill($request->all());
        $newAdicionales->save();

        Flash::success('<strong> Éxito </strong> se ha editado el adicional '.$newAdicionales->nombre.' correctamente.');

        return redirect('admin/adicionales');

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
