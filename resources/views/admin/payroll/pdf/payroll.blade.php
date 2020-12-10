<!DOCTYPE html>
<html>
<head>
	<title>{{ mb_strtoupper($nomina->full_dates, 'UTF-8') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">

		table {     
    		border-collapse: collapse; 
    	}

    	.logo {
    		padding-top: 50px;
    		padding-left: 20%;
    		position:absolute;
    	}

    </style>
</head>
<body>
	<div class="logo">
		<img src="img/logo/sefardi.png" alt="" width="130px" height="160px" style="margin-top: -50px;">
	</div>
	<div align="center" style="padding-top: 10px;">
		<h3>NOMINA QUINCENAL DE PAGO A TRABAJADORES</h3>
		<h4 style="padding-top: -20px;">J-40317369-9</h4>
		<h4 style="padding-top:-15px">Dirección: Centro Comercial Paseo Estación Central.<br>
		Maracay – Edo. Aragua.<br>
		Teléfono: 0243 – 2477782</h4>
	</div>

	<table style="width: 100%; padding-top: 5%; font-size: 15px;" border="1">
		<thead>
			<tr>
				<th>Nº DE CÉDULA DE EMPLEADOS</th>
				<th>NOMBRES DE EMPLEADOS</th>
				<th>SALARIO MENSUAL</th>
				<th>SALARIO DIARIO</th>
				<th>FALTAS</th>
				<th>TIEMPO ORDINAR.</th>
				<th>OTRAS ASIG.</th>
				<th>TOTAL A CANCELAR</th>
				<th>SSO</th>
				<th>RPE</th>
				<th>RPVH</th>
				<th>OTROS DEDUC.</th>
				<th>TOTAL DEDUCCIONES</th>
				<th>NETO A COBRAR</th>
			</tr>
		</thead>
		<tbody>
			@foreach($nominasGuardadas as $nomina)
				<tr align="center">
					<td align="left">{{ $nomina->cedula }}</td>
					<td align="left">{{ $nomina->nombre_completo }}</td>
					<td>{{ $nomina->salarioMensual }}</td>
					<td>{{ $nomina->salarioDiario }}</td>
					<td>{{ $nomina->faltas }}</td>
					<td>{{ $nomina->diasLaborados }}</td>
					<td>{{ $nomina->asignacionesExtras }}</td>
					<td>{{ $nomina->totalCancelar }}</td>
					<td>{{ $nomina->sso }}</td>
					<td>{{ $nomina->rpe }}</td>
					<td>{{ $nomina->rpvh }}</td>
					<td>{{ $nomina->deduccionesExtras }}</td>
					<td>{{ $nomina->totalDeducciones }}</td>
					<td>{{ $nomina->totalNeto }}</td>
				</tr>
			@endforeach
		</tbody>	
	</table>

	<table style="width: 50%; padding-top: 5%; font-size: 15px;" border="1">
		<thead>
			<tr>
				<th>Nº DE CÉDULA DE EMPLEADOS</th>
				<th>NOMBRES DE EMPLEADOS</th>
				<th>SUELDO QUINCENAL</th>
				<th>CESTATICKET</th>
			</tr>
		</thead>
		<tbody>
			@foreach($nominasGuardadas as $nomina)
				<tr align="center">
					<td align="left">{{ $nomina->cedula }}</td>
					<td align="left">{{ $nomina->nombre_completo }}</td>
					<td>{{ $nomina->totalNeto }}</td>
					<td>{{ $nomina->monto_cestaticket }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div style="padding-top: 15%; padding-left: 25%">
		<!-- <h3>Leyenda</h3>
		<h4 style="padding-top: -10px;">RPE = Regimen Prestacional de Empleo (Paro Forzoso).</h4>
		<h4 style="padding-top:-20px">RPVH = Regimen Prestacional de Vivienda y Habita (Politica Habitacional).</h4> -->
		<h4>ELABORADO POR</h4>
		<h4 style="padding-top: -40px; padding-left: 50%">AUTORIZADO POR</h4>
		{{ $usuario->first_name }} {{ $usuario->last_name }}
	</div>
</body>
</html>