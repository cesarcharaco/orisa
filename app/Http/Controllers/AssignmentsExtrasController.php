<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Assignment;
use App\Additional;
use App\Payroll;

use Laracasts\Flash\Flash;


class AssignmentsExtrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $others_assignments = Assignment::all();

        return view('admin.assignments_extra.index', compact('others_assignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.assignments_extra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adicional = Additional::find($request->adicional);
        $prenomina = Payroll::find($request->prenomina);
        $empleado = \DB::table('payrolls')->where([['nominasaved_id', $prenomina->id], ['empleado_id', $request->empleado]])->first();
        
        $adicional->prenomina()->attach($empleado->id);

        Flash::success('<strong> Exito </strong> se ha cargado la asignación '.$adicional->nombre.' correctamente al empleado.');

        return redirect()->back();

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
        $others_assignments = Assignment::findOrfail($id);

        return view('admin.assignments_extra.edit', compact('others_assignments'));
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
        $others_assignments = Assignment::find($id);

        Flash::success('<strong> Éxito </strong> se ha actualizado la asignación '.$request->nombre.' correctamente.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $adicional = Additional::find($request->id_adicional);
        $prenomina = Payroll::find($request->id_prenomina);
        $empleado = \DB::table('payrolls')->where([['nominasaved_id', $prenomina->id], ['empleado_id', $request->id_empleado]])->first();

        $adicional->prenomina()->detach($empleado->id);

        Flash::success('<strong> Exito </strong> se ha eliminado la asignación '.$adicional->nombre.' correctamente al empleado.');

        return redirect()->back();
    }
}
