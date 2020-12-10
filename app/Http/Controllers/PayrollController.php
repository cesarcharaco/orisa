<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

use App\Http\Requests\PayrollRequest;
use App\Http\Requests;

use App\Deduction;
use App\Employee;
use App\ExtraHour;
use App\Planning;
use App\Holiday;
use App\PayrollMade;
use App\Payroll;
use App\Cestaticket;
use App\Assistance;
use App\Assignment;
use App\DeductionExtra;
use App\Days_planning;
use App\Day_attendance;
use App\Additional;

use Carbon\Carbon;

use Sentinel;

class PayrollController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$prenominas = Payroll::orderBy('id', 'DESC')->get()->take(50);
		$indice = 0;

		return view('admin.payroll.index', compact('prenominas', 'indice'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$empleados = Employee::orderBy('nombres', 'ASC')->get();
		$años = ['2015' => '2015', '2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020'];
		$meses = ['01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'];

		return view('admin.payroll.create', compact('empleados', 'años', 'meses'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PayrollRequest $request)
	{
		$count = 0;

		if (count($request->empleados) == 0){

			Flash::warning('<strong> Alerta </strong> debe seleccionar al menos 1 empleado para crear la prenómina.');

			return redirect()->back();

		} else {

			if (Payroll::where([['mes', $request->mes], ['quincena', $request->quincena], ['year', $request->año], ['est', '1']])->exists())
			{

				Flash::warning('<strong> Alerta </strong> la prenómina seleccionada ya se encuentra creada, porfavor seleccione una fecha diferente.');

				return redirect()->back();

			} else {

				if (Payroll::where([['mes', $request->mes], ['quincena', $request->quincena], ['year', $request->año], ['est', '0']])->exists())
				{
					$prenomina = Payroll::where([['mes', $request->mes], ['quincena', $request->quincena], ['year', $request->año], ['est', '0']])->first();
				} else {

					$prenomina = new Payroll();
					$prenomina->mes      = $request->mes;
					$prenomina->quincena = $request->quincena;
					$prenomina->year     = $request->año;
					$prenomina->save();
				}

				foreach ($request->empleados as $key => $empleado) 
				{
					if (!\DB::table('payrolls')->where([['nominasaved_id', $prenomina->id], ['empleado_id', $empleado]])->exists())
					{
						$prenomina->payrolls()->attach($empleado);

						$count++;
					}
				}
										
				if ($count == 0)
				{
					Flash::warning('<strong> Disculpe </strong> todos los empleados seleccionados ya fueron registrados en la prenómina.');

					return redirect()->back();

				} else {
					
					Flash::success('<strong> Exito </strong> se ha creado la prenómina con los empleados seleccionados correctamente.');

					return redirect('admin/nomina');
				}
			}
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
		$prenomina = Payroll::find($id);
		$adicionales = $prenomina->adicionales;
		$empleados = $prenomina->payrolls;
		$deducciones = Deduction::first();
        $cestaticket = Cestaticket::first();
		$sso  = array();
		$rpe  = array();
		$rpvh = array();
		$horasExtras = array();
		$totalAsignacion = array();
		$diasLaborados = array();
		$totalCancelar = array();
		$totalDeducciones = array();

		$fecha = $prenomina->year.'-'.$prenomina->mes;

		if ($prenomina->quincena == 1)
		{

			$i = $fecha.'-01';
			$f = $fecha.'-15';
						
			$dates = Days_planning::whereBetween('dia', [$i,$f])->get();
			$assistances = Day_attendance::whereBetween('fecha', [$i,$f])->get();

		} else {

			if ($prenomina->quincena == 2 AND $prenomina->mes == 1 OR $prenomina->mes == 3 OR
																	  $prenomina->mes == 5 OR
																	  $prenomina->mes == 7 OR
																	  $prenomina->mes == 8 OR $prenomina->mes == 10 OR $prenomina->mes == 12)
			{
				$i = $fecha.'-16';
				$f = $fecha.'-31';

				$dates = Days_planning::whereBetween('dia', [$i,$f])->get();
				$assistances = Day_attendance::whereBetween('fecha', [$i,$f])->get();

			} else {

				if ($prenomina->quincena == 2 AND $prenomina->mes == 2)
				{
					$i = $fecha.'-16';
					$f = $fecha.'-29';

					$dates = Days_planning::whereBetween('dia', [$i,$f])->get();
					$assistances = Day_attendance::whereBetween('fecha', [$i,$f])->get();

				} else {

					$i = $fecha.'-16';
					$f = $fecha.'-30';

					$dates = Days_planning::whereBetween('dia', [$i,$f])->get();
					$assistances = Day_attendance::whereBetween('fecha', [$i,$f])->get();
                }
            }
        }

        if (count($assistances) < 10)
        {
            Flash::warning('<strong> Disculpe </strong> las asistencias de los empleados no estan completas, debe registrar primero asistencias.');

            return redirect()->back();

        } else {
            return view('admin.payroll.show', compact('i', 'f', 'dates', 'assistances', 'adicionales', 'empleados', 'sso', 'rpe', 'rpvh', 'horasExtras', 'deducciones', 'cestaticket', 'totalAsignacion', 'diasLaborados', 'totalCancelar', 'totalDeducciones', 'prenomina'));
        }
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
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
		dd($request->all());
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
	
	public function view()
	{
		$payroll = Payroll::all();

		return view('admin.payroll.view', compact('payroll'));
	}

	public function show2(Request $request)
	{
		$payroll = Payroll::all();
		$payroll_here = Payroll::find($request->id);
		$payroll_list = Payroll::find($request->id);
		$payroll_show = $payroll_list->payroll;

		return view('admin.payroll.view', compact('payroll', 'payroll_show', 'payroll_here', 'payroll_list'));
	}

	public function pdf($id)
	{
		$nomina = Payroll::find($id);
		$nominasGuardadas = $nomina->nominas;
		$usuario = $nomina->nominas->first()->user;

		$pdf =  \PDF::loadView('admin.payroll.pdf.payroll', ['nomina' => $nomina, 'nominasGuardadas' => $nominasGuardadas, 'usuario' => $usuario])->setPaper('a3', 'landscape');
		
		return $pdf->stream();
	}

}
