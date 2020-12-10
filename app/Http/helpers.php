<?php
	
use Carbon\Carbon;
	
	function fecha_actual()
	{
		$date = Carbon::now();
		return $date->format('d/m/Y');
	}

	function currentUser()
	{
		return Sentinel::getUser();
	}

	function bitacora($descripcion, $operacion, $operacion_id){
		$bitacora = new App\Bitacora();
		$bitacora->user_id = Sentinel::getUser()->id;
		$bitacora->descripcion = $descripcion;
		$bitacora->operacion = $operacion;
		$bitacora->operacion_id = $operacion_id;
		$bitacora->save();
	}

	function fechaNatural($f)
	{
		$fecha = new Carbon($f);
		return $fecha->format('d/m/Y');
	}

	function fecha($created_at)
	{
		$fecha = new Carbon($created_at);
		$dias = array(0 => 'Domingo',1 => 'Lunes', 2 => 'Martes', 3 => 'Miercoles', 4 => 'Jueves', 5 => 'Viernes', 6 => 'Sabado');

		foreach ($dias as $key => $value) {
			if($key == $fecha->dayOfWeek){
				$dia = $value;
			}
		}

		return $dia.' '.$fecha->format('d-m-Y');
	}

	function hora($created_at)
	{
		$fecha = new Carbon($created_at);
		return $fecha->format('g:i a');
	}

	/* - - - - - - - - PLANIFICACIÓN  - - - - - - - - */

	function dias($fechas)
	{

		$fechats = strtotime($fechas);
        	switch (date('w', $fechats))
        	{
                case 0: return "DOMINGO";   break;
                case 1: return "LUNES";     break;
                case 2: return "MARTES";    break;
                case 3: return "MIÉRCOLES"; break; 
                case 4: return "JUEVES";    break;
                case 5: return "VIERNES";   break; 
                case 6: return "SÁBADO";    break;
            }
	}

	function asignados($empleado, $dia, $planificacion)
	{
		$labora = \DB::table('employees_has_days')->where([['empleado_id', $empleado], ['dia_id', $dia], ['planificacion_id', $planificacion]])->exists();

		return $labora;
	}

	/* - - - - - - - - NÓMINA  - - - - - - - - */

	function laborados($empleado, $asistencias, $fechas)
	{
		$newLaborados = 0;

		if(count($fechas) > 0 AND count($asistencias) > 0)
		{
			foreach ($fechas as $key => $fecha) 
			{
				foreach ($asistencias as $key => $asistencia) 
				{
					if(\DB::table('employees_has_days')->where([['dia_id', $fecha->id], ['empleado_id', $empleado]])->exists())
					{
						if(\DB::table('assistances')->where([['asistencia_id', $asistencia->id], ['empleado_id', $empleado], ['motivo', 'Asistio']])->exists() OR \DB::table('assistances')->where([['asistencia_id', $asistencia->id], ['empleado_id', $empleado], ['motivo', 'No Asistio'], ['justificacion', 'S']])->exists())
						{
							$newLaborados = $newLaborados+1;
						}

					}else{

						if(\DB::table('assistances')->where([['asistencia_id', $asistencia->id], ['empleado_id', $empleado], ['motivo', 'Asistio']])->exists())
						{
							$newLaborados = $newLaborados+1;
						}
					}
				}

				break;
			}

			return $newLaborados;

		} else {

			return 0;
		}

		return $newLaborados;
	}

	function feriadosDescanso($empleado, $asistencias, $fechas)
	{
		$feriadosDescanso = 0;

		if(count($fechas) > 0 AND count($asistencias) > 0)
		{
			foreach ($fechas as $key => $fecha) 
			{
			    $dia = $fecha->dia;

                $sql = \DB::table('employees_has_days')->where([['dia_id', $fecha->id], ['empleado_id', $empleado], ['planificacion_id', $fecha->planificacion_id]])->first();

                if(empty($sql))
                {
                    $fechaNew = \DB::table('days_with_assistances')->where('fecha', $dia)->first();
                    // PARA EMPLEADOS QUE NO ESTAN EN LA PLANIFICACIÓN, NO LES CORRESPONDE VENIR ESE DÍA

                    if(\DB::table('assistances')->where([['asistencia_id', $fechaNew->id], ['empleado_id', $empleado], ['motivo', 'Asistio']])->exists())
                    {
                        $feriadosDescanso = $feriadosDescanso+1;
                    }

                }

                // PARA EMPLEADOS QUE SI ESTAN EN LA PLANIFICACIÓN PERO ES UN DÍA NO LABORABLE

                if ($fecha->estatus == 'No laborable')
                {
                    $fechaNew = \DB::table('days_with_assistances')->where('fecha', $fecha->dia)->first();

                    if (\DB::table('assistances')->where([['asistencia_id', $fechaNew->id], ['empleado_id', $empleado], ['motivo', 'Asistio']])->exists())
                    {
                        $feriadosDescanso = $feriadosDescanso + 1;
                    }
                }

			}

			return $feriadosDescanso;

		} else {

			return 0;
		}

	}

	function horasExtras($empleado, $asistencias)
	{
		$extraHourEmployee = array();

		if(count($asistencias) > 0)
		{
			foreach ($asistencias as $key => $asistencia) 
			{
				$laborados = App\Assistance::where([['empleado_id', $empleado], ['asistencia_id', $asistencia->id], ['motivo', 'Asistio']])->first();

				if(!empty($laborados))
				{
					$entrada = Carbon::parse($laborados->hora_entrada);
					$salida = Carbon::parse($laborados->hora_salida);

					$time = Carbon::createFromTime($entrada->hour, $entrada->minute, $entrada->second);
		           	$time2 = Carbon::createFromTime($salida->hour, $salida->minute, $salida->second);

					$timeForExtraCoding = $entrada->diffInHours($salida, false);

					if($timeForExtraCoding > '8')
		            {
		                $extraHourEmployee[] = $timeForExtraCoding-8;
		            
		            } else {

		                $extraHourEmployee[] = 0;
		            }

				}
			}

		} else {

			$extraHourEmployee[] = 0;
		}

		$i = 0;

		if(count($extraHourEmployee) > 0)
		{
			foreach ($extraHourEmployee as $key => $extraHour) 
			{
				$i += $extraHour;
			}
		}

		return $i;
	}		

	function asignacion($empleado, $horasExtras)
	{
		if ($empleado->turno->turno == 'Mañana')
		{
			$salarioDiario = $empleado->cargo->salario / 30;
			$valorxHora = $salarioDiario / 8;
			$valorHoraExtra = ($valorxHora * 1.5);

			$valor = ($valorHoraExtra * $horasExtras);

			return number_format($valor, 2, '.', ',');

		} else {

			$salarioDiario = $empleado->cargo->salario / 30;
			$valorxHora = $salarioDiario / 8;
			$valorHoraExtra = ($valorxHora * 1.8);

			$valor = ($valorHoraExtra * $horasExtras);

			return  number_format($valor, 2, '.', ',');

		}
	}

	function asignacionesExtras($empleado, $prenomina)
	{
		// P - PORCENTAJE
		// D - DIA
		// V - VALOR

		$asignaciones = \DB::table('additional')->where([['id_prenomina', $prenomina], ['tipo', 'A']])->get();
		$empleadoPrenomina = \DB::table('payrolls')->where([['nominasaved_id', $prenomina], ['empleado_id', $empleado->id]])->first();
		
		$salarioDiario = $empleado->cargo->salario / 30;

		$otrasAsignaciones = 0;

		if (count($asignaciones) > 0)
		{
			foreach ($asignaciones as $key => $asignacion) 
			{
				$adicionales = \DB::table('payrolls_additional')->where([['prenomina_id', $empleadoPrenomina->id], ['adicional_id', $asignacion->id]])->first();

				if (!empty($adicionales))
				{
					$adicional = \DB::table('additional')->where('id', $adicionales->adicional_id)->first();

					if(!empty($adicional))
					{
						if ($adicional->modo_pago == 'P' OR $adicional->modo_pago == 'D')
						{
							$adicionalNew = $adicional->monto / 100;
								
							$otrasAsignaciones += $salarioDiario * $adicionalNew;

						} else {

							$otrasAsignaciones += $adicional->monto;
						}
					}
				}		
			}

			return number_format($otrasAsignaciones, 2, '.', ',');

		} else {

			return number_format(0.00, 2, '.', ',');
		}
	}

	function totalCancelar($empleado, $asignacion, $laborados, $asignacionesExtras, $feriados)
	{	
		$newLaborados = 0;

		if ($feriados > 0)
		{
			$salarioDiario = $empleado->cargo->salario / 30;
			$newLaborados = $laborados - $feriados;
			$newSalario = $salarioDiario * $feriados;

			$totalCancelar = ($salarioDiario * $newLaborados) + $asignacion + $asignacionesExtras;
			$totalCancelar += ($newSalario * 1.5);

		} else {

			$salarioDiario = $empleado->cargo->salario / 30;
			$totalCancelar = ($salarioDiario * $laborados) + $asignacion + $asignacionesExtras;
		}

		return $totalCancelar;
	}

	function sso($empleado, $sso, $i, $f)
	{
		$fx = Carbon::parse($i);
        $fx2 = Carbon::parse($f);

        $ssoNew = $sso / 100;

        $dx = Carbon::create($fx->year, $fx->month, $fx->day);
        $dx2 = Carbon::create($fx2->year, $fx2->month, $fx2->day);
        
        $daysForExtraCoding = $dx->diffInDaysFiltered(function(Carbon $date)
        {
            return $date->isMonday();
        }, $dx2);

		$salario = ($empleado->cargo->salario * 12/52);
		
		$seguroSO = $salario * $ssoNew * $daysForExtraCoding;
		
		return number_format($seguroSO, 2, '.', ',');
	}

	function rpe($empleado, $rpe, $i, $f)
	{
		$fx = Carbon::parse($i);
        $fx2 = Carbon::parse($f);
        $rpeNew = $rpe / 100;

        $dx = Carbon::create($fx->year, $fx->month, $fx->day);
        $dx2 = Carbon::create($fx2->year, $fx2->month, $fx2->day);

        $daysForExtraCoding = $dx->diffInDaysFiltered(function(Carbon $date)
        {
            return $date->isMonday();
        }, $dx2);

		$salario = ($empleado->cargo->salario * 12/52);
		$paroForzoso = $salario * $rpeNew * $daysForExtraCoding;
		
		return number_format($paroForzoso, 2, '.', ',');
	}

	function rpvh($empelado, $rpvh, $asignacion)
	{
		$rpvhNew = $rpvh / 100;

		$politicaHabitacional = $asignacion * $rpvhNew;

		return number_format($politicaHabitacional, 2, '.', ',');
	}

	function totalDeducciones($sso, $rpe, $rpvh, $deduccionesExtras)
	{
		$totalDeducciones = $sso + $rpe + $rpvh + $deduccionesExtras;

		return $totalDeducciones;
	}

	function netoCobrar($asignacion, $deduccion)
	{
		$netoAcobrar = $asignacion - $deduccion;

		return $netoAcobrar;
	}

	function otrasDeducciones($empleado, $prenomina)
	{
		// P - PORCENTAJE
		// D - DIA
		// V - VALOR

		$asignaciones = \DB::table('additional')->where([['id_prenomina', $prenomina], ['tipo', 'D']])->get();
		$empleadoPrenomina = \DB::table('payrolls')->where([['nominasaved_id', $prenomina], ['empleado_id', $empleado->id]])->first();
		
		$salarioDiario = $empleado->cargo->salario / 30;

		$otrasAsignaciones = 0;

		if (count($asignaciones) > 0)
		{
			foreach ($asignaciones as $key => $asignacion) 
			{
				$adicionales = \DB::table('payrolls_additional')->where([['prenomina_id', $empleadoPrenomina->id], ['adicional_id', $asignacion->id]])->first();

				if (!empty($adicionales))
				{
					$adicional = \DB::table('additional')->where('id', $adicionales->adicional_id)->first();

					if(!empty($adicional))
					{
						if ($adicional->modo_pago == 'P' OR $adicional->modo_pago == 'D')
						{
							$adicionalNew = $adicional->monto / 100;
								
							$otrasAsignaciones += $salarioDiario * $adicionalNew;

						} else {

							$otrasAsignaciones += $adicional->monto;
						}
					}
				}		
			}

			return number_format($otrasAsignaciones, 2, '.', ',');

		} else {

			return number_format(0.00, 2, '.', ',');
		}
	}

	function faltas($empleado, $asistencias, $fechas)
	{
		$noAsistio = 0;

		if(count($fechas) > 0 AND count($asistencias) > 0)
		{
			foreach ($fechas as $key => $fecha) 
			{
				foreach ($asistencias as $key => $asistencia) 
				{
					if(\DB::table('employees_has_days')->where([['dia_id', $fecha->id], ['empleado_id', $empleado->id]])->exists())
					{
						if(\DB::table('assistances')->where([['asistencia_id', $asistencia->id], ['empleado_id', $empleado->id], ['motivo', 'No Asistio']])->exists())
						{
							$noAsistio = $noAsistio+1;
						}
					}
				}

				break;
			}

			return $noAsistio;

		} else {

			return $noAsistio;
		}
	}

	function cestaticket($empleado, $cestaticket, $laborados) 
	{
		$cestaticketValor = $cestaticket->unidad_tributaria * $cestaticket->cantidad;
		
		if ($empleado->info->cestaticket == 'Si') 
		{

			$totalCestaticket = $cestaticketValor * 15;

			return number_format($totalCestaticket, 2, '.', ',');

		} else {

			return 'NO APLICA';
		}
	}

	function descontarCestaticket($empleado, $cestaticket, $faltas)
	{
		$cestaticketValor = $cestaticket->unidad_tributaria * $cestaticket->cantidad;

		if ($empleado->info->cestaticket == 'Si') 
		{
			$totalCestaticket = $cestaticketValor * $faltas;

			return number_format($totalCestaticket, 2, '.', ',');

		} else {

			return number_format(0.00, 2, '.', ',');

		}
	}

	function contarAsignaciones($adicionales)
	{
		$contador = 0; 

		foreach ($adicionales as $key => $adicional) 
		{
			if ($adicional->tipo == 'A')
			{
				$contador++;

			}
		}

		return $contador;
	}

	function contarDeducciones($adicionales)
	{
		$contador = 0; 

		foreach ($adicionales as $key => $adicional) 
		{
			if ($adicional->tipo == 'D')
			{
				$contador++;

			}
		}

		return $contador;
	}

	function salarioDiario($salarioMensual)
	{
		$salarioDiario = $salarioMensual / 30;

		return number_format($salarioDiario, 2, '.', ',');
	}

	function adicionalAsignada($adicional, $empleado, $prenomina)
	{
		$prenominaEmpleado = \DB::table('payrolls')->where([['nominasaved_id', $prenomina], ['empleado_id', $empleado]])->first();

		if (\DB::table('payrolls_additional')->where([['prenomina_id', $prenominaEmpleado->id], ['adicional_id', $adicional]])->exists())
		{
			return true;
		}
		
	}

	function adicionalNoAsignada($adicional, $empleado, $prenomina)
	{
		$prenominaEmpleado = \DB::table('payrolls')->where([['nominasaved_id', $prenomina], ['empleado_id', $empleado]])->first();

		if (\DB::table('payrolls_additional')->where([['prenomina_id', $prenominaEmpleado->id], ['adicional_id', $adicional]])->exists())
		{
			return true;
		}
		
	}

	function totalAsignacion($asignaciones)
	{
		$total = 0;

		foreach ($asignaciones as $key => $asignacion) 
		{	
			$total += $asignacion;
		}
		
		return number_format($total, 2, '.', ',');
	}

	function totalOtros($otrasAsignaciones)
	{
		$total = 0;

		foreach ($otrasAsignaciones as $key => $asignacion) 
		{	
			$total += $asignacion;
		}
		
		return number_format($total, 2, '.', ',');
	}

	function totalCancelarEm($totalCancelar)
	{
		$total = 0;

		foreach ($totalCancelar as $key => $cancelar) 
		{	
			$total += $cancelar;
		}
		
		return number_format($total, 2, '.', ',');
	}

	function totalSSO($ssos)
	{
		$total = 0;

		foreach ($ssos as $key => $sso) 
		{	
			$total += $sso;
		}
		
		return number_format($total, 2, '.', ',');
	}

	function totalRPE($rpes)
	{
		$total = 0;

		foreach ($rpes as $key => $rpe) 
		{	
			$total += $rpe;
		}
		
		return number_format($total, 2, '.', ',');
	}

	function totalRPVH($rpvhs)
	{
		$total = 0;

		foreach ($rpvhs as $key => $rpvh) 
		{	
			$total += $rpvh;
		}
		
		return number_format($total, 2, '.', ',');
	}

	function totalOtrasDeducciones($otrasDeducciones)
	{
		$total = 0;

		foreach ($otrasDeducciones as $key => $deducciones) 
		{	
			$total += $deducciones;
		}
		
		return number_format($total, 2, '.', ',');
	}

	function totalDeduccionesExtras($deduccionesExtras)
	{	
		$total = 0;

		foreach ($deduccionesExtras as $key => $deducciones) 
		{	
			$total += $deducciones;
		}
		
		return number_format($total, 2, '.', ',');
	}

	function totalNeto($totalNeto)
	{
		$total = 0;

		foreach ($totalNeto as $key => $totalN) 
		{	
			$total += $totalN;
		}

		return number_format($total, 2, '.', ',');
	}
	
	function fechaInicio($fecha_inicio)
	{
		return Carbon::parse($fecha_inicio)->format('d/m/Y');
	}

	function fechaFinal($fecha_final)
	{
		return Carbon::parse($fecha_final)->format('d/m/Y');
	}