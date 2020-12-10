<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\PayrollMade;
use App\Payroll;

use Laracasts\Flash\Flash;

class PayrollSavedController extends Controller
{
	public function index()
	{
		$nominas = PayrollMade::orderBy('id', 'DESC')->get()->take(100);
		$indice = 0;

		return view('admin.payroll.payrollMade.index', compact('nominas', 'indice'));
	}

    public function create(Request $request)
    {
    	$newPrenomina = Payroll::find($request->prenomina);
    	
    	if ($newPrenomina->est == 0)
    	{
	    	foreach ($request->cedula as $key => $prenomina) 
	    	{
		    	$nomina = new PayrollMade;

		    	$nomina->id_usuario           = \Sentinel::getUser()->id;
		    	$nomina->cedula               = $prenomina;
		    	$nomina->nombre_completo      = $request->nombre_completo[$key];
		    	$nomina->cargo                = $request->cargos[$key];
		    	$nomina->diasLaborados        = $request->diasLaborados[$key];
		    	$nomina->feriadosDescanso     = $request->feriadosDescanso[$key];
		    	$nomina->horasExtas           = $request->horasExtas[$key];
		    	$nomina->totalAsignacion      = $request->totalAsignacion[$key];
		    	$nomina->asignacionesExtras   = $request->asignacionesExtras[$key];
		    	$nomina->deduccionesExtras    = $request->deduccionesExtras[$key];
		    	$nomina->totalCancelar        = $request->totalCancelar[$key];
		    	$nomina->sso                  = $request->sso[$key];
		    	$nomina->rpe                  = $request->rpe[$key];
		    	$nomina->rpvh                 = $request->rpvh[$key];
		    	$nomina->totalDeducciones     = $request->totalDeducciones[$key];
		    	$nomina->totalNeto            = $request->totalNeto[$key];
		    	$nomina->salarioMensual       = $request->salarioMensual[$key];
		    	$nomina->salarioDiario        = $request->salarioDiario[$key];
		    	$nomina->unidad_tributaria    = $request->unidad_tributaria[$key];
		    	$nomina->monto_cestaticket    = $request->cestaticket[$key];
		    	$nomina->faltas               = $request->faltas[$key];
		    	$nomina->descuentoCestaticket = $request->descuentoCestaticket[$key];
		    	$nomina->id_prenomina         = $request->prenomina;
		    	$nomina->save();
	    	}

    		$newPrenomina->est = 1;
    		$newPrenomina->save();

    		Flash::success('<strong> Exito </strong> se han creado las nóminas de los empleados correctamente.');

    		return redirect('admin/nominas/guardadas');

    	} else {

    		foreach ($request->cedula as $key => $prenomina) 
	    	{
    			if (PayrollMade::where('cedula', $prenomina)->exists())
    			{
    				$nomina = PayrollMade::where('cedula', $prenomina)->first();

			    	$nomina->cedula               = $prenomina;
			    	$nomina->nombre_completo      = $request->nombre_completo[$key];
			    	$nomina->cargo                = $request->cargos[$key];
			    	$nomina->diasLaborados        = $request->diasLaborados[$key];
			    	$nomina->feriadosDescanso     = $request->feriadosDescanso[$key];
			    	$nomina->horasExtas           = $request->horasExtas[$key];
			    	$nomina->totalAsignacion      = $request->totalAsignacion[$key];
			    	$nomina->asignacionesExtras   = $request->asignacionesExtras[$key];
			    	$nomina->deduccionesExtras    = $request->deduccionesExtras[$key];
			    	$nomina->totalCancelar        = $request->totalCancelar[$key];
			    	$nomina->sso                  = $request->sso[$key];
			    	$nomina->rpe                  = $request->rpe[$key];
			    	$nomina->rpvh                 = $request->rpvh[$key];
			    	$nomina->totalDeducciones     = $request->totalDeducciones[$key];
			    	$nomina->totalNeto            = $request->totalNeto[$key];
			    	$nomina->salarioMensual       = $request->salarioMensual[$key];
			    	$nomina->salarioDiario        = $request->salarioDiario[$key];
			    	$nomina->unidad_tributaria    = $request->unidad_tributaria[$key];
			    	$nomina->monto_cestaticket    = $request->cestaticket[$key];
			    	$nomina->faltas               = $request->faltas[$key];
			    	$nomina->descuentoCestaticket = $request->descuentoCestaticket[$key];
			    	$nomina->save();
    			}
    		}

    		Flash::success('<strong> Exito </strong> se han actualizado las nóminas guardadas correctamente.');

    		return redirect('admin/nominas/guardadas');
    		
    	}
    }

    public function show($id)
    {
    	$nomina = PayrollMade::find($id);

    	return view('admin.payroll.payrollMade.show', compact('nomina'));
    }

    public function pdfNomina($id)
    {
    	$nomina = PayrollMade::findOrFail($id);

    	$pdf =  \PDF::loadView('admin.payroll.pdf.payrollIndividual', ['nomina' => $nomina]);

    	return $pdf->stream();   
    }
}
