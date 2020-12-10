<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_employee;
use App\Employee;
use App\Position;
use App\Turn;
use App\Http\Requests;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\SearchRequest;
use Laracasts\Flash\Flash;
use Response;

use Carbon\Carbon;


class EmployeesController extends Controller
{

    public function index(Request $request)
    {
        $empleados = Employee::all();
        return view('admin.empleados.index', compact('empleados'));
    }

    public function search(Request $request)
    {
        return view('admin.empleados.search');
    }

    public function getCargo($id)
    {
        $cargo = Position::find($id);
        $empleados = Employee::where('cargo_id', $id)->get();
        $nombre = str_split($cargo->nombre);
        $numero = $empleados->count() + 1;
        $codigo = strtoupper($nombre[0]).strtoupper($nombre[1]).'-00'.$numero;
        return Response::json($codigo);
    }

    public function create(SearchRequest $request)
    {
        $dni_cedula = $request->nationality.'-'.$request->cedula;
        $exists = Employee::where('dni_cedula', $dni_cedula)->exists();

        if ($exists)
        {
            Flash::warning('<strong> Alerta </strong> busqueda con número de cédula <strong>'. $dni_cedula .'</strong> se encuentra en la base de datos.');

            return redirect()->back();

        }else{

            Flash::info('<strong> INFO </strong> búsqueda con número de cédula '. $dni_cedula .' no se encuentra en la base de datos, proceda a llenar los campos.');

            $cargos = Position::lists('nombre', 'id');
            $turnos = Turn::lists('turno', 'id');
            $empleado = false;
            return view('admin/empleados/create', compact('dni_cedula','cargos', 'turnos','empleado'));
        }
    }

    public function store(Request $request)
    {
        $var = $request->duracion == null ? 0 : $request->duracion;

        $empleado = Employee::create($request->all());

        $empleadoInfo = new Data_employee;
        $empleadoInfo->empleado_id       = $empleado->id;
        $empleadoInfo->codigo            = $request->codigo;
        $empleadoInfo->fecha_de_admision = Carbon::parse($request->fecha_de_admision)->format('Y-m-d');
        $empleadoInfo->contrato          = $request->contrato;
        $empleadoInfo->duracion          = $var;
        $empleadoInfo->cestaticket       = $request->cestaticket;
        $empleadoInfo->banco             = $request->banco;
        $empleadoInfo->cuenta_tipo       = $request->cuenta_tipo;
        $empleadoInfo->cuenta_numero     = $request->primeros.'-'.$request->segundos.'-'.$request->numero;
        $empleadoInfo->save();

        bitacora('Registro el empleado',$empleado->nombres, $empleado->id);

        if ($request->user == 1)
        {
            return redirect()->route('admin.usuarios.create', ['id' => $empleado]);

        } else {

            Flash::success('<strong> Éxito </strong> se ha registrado el empleado '.$empleado->nombres.' correctamente.');

            return redirect('admin/empleados');
        }
    }

    public function show($id)
    {
        $employee = Employee::find($id);

        return view('admin.empleados.show', compact('employee'));
    }

    public function edit($id)
    {
        $empleado = Employee::findOrfail($id);
        $cargos = Position::lists('nombre', 'id');
        $turnos = Turn::lists('turno', 'id');
        $dni_cedula = false;

        return view('admin.empleados.edit', compact('empleado', 'turnos', 'cargos', 'dni_cedula'));

    }

    public function update(Request $request, $id)
    {
        $empleado= Employee::find($id);
        $empleado->fill($request->all())->save();

        $info = $empleado->info;
        $info->fill($request->all())->save();

        bitacora('Registro el empleado',$empleado->nombres, $empleado->id);
        Flash::success('<strong> Éxito </strong> se ha actualizado el empleado <em>'.$empleado->full_name.'</em> correctamente.');

        return redirect()->back();
    }

    public function destroy(Request $request)
    {   

        $employee = Employee::find($request->id);
        $employee->delete();

        Flash::success('<strong> Exito </strong> el empleado '. $employee->names_em .' se eliminó correctamente');

        return redirect('admin/empleados');
    }

    public function print($id)
    {
        $empleado = Employee::find($id);

        $pdf =  \PDF::loadView('admin.empleados.pdf.individual', ['empleado' => $empleado]);

        return $pdf->stream();
    }


    public function printList()
    {   
        $empleados = Employee::all();
        $pdf =  \PDF::loadView('admin.empleados.pdf.listado', ['empleados' => $empleados]);

        return $pdf->stream();        
    }
}
