<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th colspan="6" class="text-center"> ASISTENCIA DE EMPLEADOS QUE LABORAN EN LA FECHA {{ $fecha }} </th>
		</tr>
		<tr>
			<th class="text-center">#</th>
			<th> Nombres</th>
			<th> Turno</th>
			<th> Entrada</th>
			<th> Salida</th>
			<th> Opción</th>
		</tr>
	</thead>
	<tbody>	
		@if(count($empleadosLaboran) > 0)
			@foreach($empleadosLaboran as $key => $empleado)
				<tr>
					<td class="text-center" style="width: 50px;">
						{{ $indice = $indice+1 }} {!! Form::hidden('empleadosLaboran[]', $empleado->id) !!}
					</td>
					<td style="width: 300px;"> 
						{{ $empleado->full_name }} 
					</td>
					<td> 
						{{ $empleado->turno->turno }}
					</td>
					<td class="text-center"> 
						{!! Form::time('hora_entrada[]', $empleado->turno->hora_entrada, ['disabled' => 'disabled', 'class' => 'entradasL']) !!}
					</td>
					<td class="text-center">  
						{!! Form::time('hora_salida[]', $empleado->turno->hora_salida, ['disabled' => 'disabled', 'class' => 'salidasL']) !!}
					</td>
					<td>
						{!! Form::select('motivo[]', ['Libre' => 'LIBRE', 'Asistio' => 'ASISTIO', 'No Asistio' => 'NO ASISTIO'], null, ['class' => 'form-control laboran', 'placeholder' => 'SELECCIONE', 'required' => 'required', 'onchange' => 'desbloquear()']) !!}
					</td>
				</tr>
			@endforeach
		@else
			<tr>
				<td colspan="6" class="text-center"> No se encontraron registros </td>
			</tr>
		@endif
	</tbody>
</table>

	{!! Form::hidden('fecha', $fecha) !!}

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th colspan="6" class="text-center"> ASISTENCIA DE EMPLEADOS QUE NO LABORAN EN LA FECHA {{ $fecha }} </th>
		</tr>
		<tr>
			<th class="text-center">#</th>
			<th> Nombres</th>
			<th> Turno</th>
			<th> Entrada</th>
			<th> Salida</th>
			<th> Opción</th>
		</tr>
	</thead>
	<tbody>	
		@if(count($empleadosNoLaboran) > 0)
			@foreach($empleadosNoLaboran as $key => $empleado)
				<tr>
					<td class="text-center" style="width: 50px;">
						{{ $indice = $indice+1 }} {!! Form::hidden('empleadosNoLaboran[]', $empleado->id) !!}
					</td>
					<td style="width: 300px;"> 
						{{ $empleado->full_name }} 
					</td>
					<td> 
						{{ $empleado->turno->turno }}
					</td>
					<td class="text-center"> 
						{!! Form::time('hora_entradaNL[]', $empleado->turno->hora_entrada, ['disabled' => 'disabled', 'class' => 'entradasNL']) !!}
					</td>
					<td class="text-center">  
						{!! Form::time('hora_salidaNL[]', $empleado->turno->hora_salida, ['disabled' => 'disabled', 'class' => 'salidasNL']) !!}
					</td>
					<td>
						{!! Form::select('motivoNL[]', ['Libre' => 'LIBRE', 'Asistio' => 'ASISTIO'], null, ['class' => 'form-control noLaborados', 'placeholder' => 'SELECCIONE', 'required' => 'required', 'onchange' => 'desbloquear2()']) !!}
					</td>
				</tr>
			@endforeach
		@else
			<tr>
				<td colspan="6" class="text-center"> No se encontraron registros </td>
			</tr>
		@endif
	</tbody>
</table>
