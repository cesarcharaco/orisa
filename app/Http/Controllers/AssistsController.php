<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Assistance;
use App\Day_attendance;
use App\Days_planning;
use App\Employee;
use App\Holiday;
use Laracasts\Flash\Flash;

class AssistsController extends Controller
{
    
    public function index()
    {
        $asistencias = Assistance::orderBy('id', 'DESC')->get()->take(100);
        $indice = 0;

    	return view('admin.asistencias.index', compact('asistencias', 'indice'));
    }

    public function search()
    {
    	return view('admin.asistencias.search');
    }

    public function create(Request $request)
    {
        $empleados = Employee::orderBy('id', 'ASC')->get();
        $empleadosLaboran = array();
        $empleadosNoLaboran = array();
        $fecha = $request->fecha;
        $indice = 0;

        if (!Day_attendance::where('fecha', $request->fecha)->exists())
        {
            $dia = Days_planning::where('dia', $request->fecha)->first();
            
            if (Days_planning::where('dia', $request->fecha)->exists()) 
            {
                foreach ($empleados as $key => $empleado) 
                {
                    if ($empleado->hoem()->where('dia_id', $dia->id)->exists())
                    {
                        $empleadosLaboran[] = $empleado;

                    } else {

                        $empleadosNoLaboran[] = $empleado;
                    }
                }
                
            }else{

                Flash::warning('<strong> Alerta </strong> no existen resultados coincidentes <strong>'. $request->fecha .'</strong> proceda a crear una planificación.');

                return redirect()->back();
            }

            return view('admin.asistencias.create', compact('fecha', 'empleadosLaboran', 'empleadosNoLaboran', 'indice'));

        } else {

            $dia = Day_attendance::where('fecha', $request->fecha)->first();

            foreach ($empleados as $key => $empleado) 
            {

                if (!$empleado->attendance()->where([['asistencia_id', $dia->id], ['empleado_id', $empleado->id]])->exists())
                {   
                    if ($empleado->hoem()->where('dia_id', $dia->id)->exists())
                    {
                        $empleadosLaboran[] = $empleado;

                    } else {

                        $empleadosNoLaboran[] = $empleado;
                    }

                } else {

                    $empleadosLaboran = array();
                    $empleadosNoLaboran = array();
                }
            }

            return view('admin.asistencias.create', compact('fecha', 'empleadosLaboran', 'empleadosNoLaboran', 'indice'));

        }
    }

    public function store(Request $request)
    {
        //dd($request->all());
        if (!Day_attendance::where('fecha', $request->fecha)->exists())
        { 
            $fecha = Day_attendance::create($request->all());
            $fecha->save();

        } else {

            $fecha = Day_attendance::where('fecha', $request->fecha)->first();
        }

        if (isset($request->empleadosLaboran))
        {
            $count = 0;

            foreach ($request->empleadosLaboran as $key => $empleado) 
            {

                $asistencias = new Assistance;
                $asistencias->empleado_id = $empleado;
                $asistencias->asistencia_id = $fecha->id;

                if($request->motivo[$key] == 'Asistio')
                {
                    $asistencias->hora_entrada = $request->hora_entrada[$count];
                    $asistencias->hora_salida = $request->hora_salida[$count];
                    
                    $count++;

                }

                $asistencias->motivo = $request->motivo[$key];
                $asistencias->save();      
            }
        }

        if (isset($request->empleadosNoLaboran))
        {
            $count = 0;

            foreach ($request->empleadosNoLaboran as $key2 => $empleado) 
            {
                $asistencias = new Assistance;
                $asistencias->empleado_id = $empleado;
                $asistencias->asistencia_id = $fecha->id;

                if ($request->motivoNL[$key2] == 'Asistio')
                {
                    $asistencias->hora_entrada = $request->hora_entradaNL[$count];
                    $asistencias->hora_salida = $request->hora_salidaNL[$count];

                    $count++;

                }
                
                $asistencias->motivo = $request->motivoNL[$key2];
                $asistencias->save();

            }
        }

        
        Flash::success('<strong> Éxito </strong> se han creado nuevas asistencias para la fecha <strong>'. $request->fecha .'</strong>.');

        return redirect('admin/asistencias');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $asistencia = Assistance::find($id);

    	return view('admin.asistencias.edit', compact('asistencia')); 
    }

    public function update(Request $request, $id)
    {
    	$asistencia= Assistance::find($id);

        if ($request->motivo == 'No Asistio' OR $request->motivo == 'Libre')
        {
            $asistencia->hora_entrada = null;
            $asistencia->hora_salida  = null;
            $asistencia->motivo = $request->motivo;
            $asistencia->justificacion = $request->justificacion;
            $asistencia->razon = $request->razon;
            $asistencia->save();

        } else {

            $asistencia->hora_entrada = $request->hora_entrada;
            $asistencia->hora_salida  = $request->hora_salida;
            $asistencia->motivo = $request->motivo;
            $asistencia->justificacion = $request->justificacion;
            $asistencia->razon = $request->razon;
            $asistencia->save();

        }

        Flash::success('<strong> Éxito </strong> se ha modificado la asistencia al empleado '.$asistencia->personal->full_name.' en la fecha '. $asistencia->attendays->fecha .' correctamente.');

        return redirect('admin/asistencias');
    }

    public function destroy($id)
    {
    	$asistencia = Assistance::find($id);
        $asistencia->delete();

        Flash::success('<strong> Exito </strong> la asistencia se eliminó correctamente');

        return redirect('admin/asistencias');
    }
}
