<!DOCTYPE html>
<html>
<head>
	<title>Datos del cliente</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">

		table {     
    		border-collapse: collapse;
    		padding: 10;
    		width: 100%;
    	}
    	.mitad{
    		width: 50%;
    	}

    	tr {
    		text-align: center;
    	}

		.fecha {
			font-size: 10px;
			display: inline-block;
		}

    	td, th {
    		padding: 5px;
    	}

    	.logo {
    		padding-top: 50px;
    		padding-left: 7%;
    		position: absolute;
    	}
    </style>
</head>
</head>
<body>
	<div class="logo">
		<img src="img/logo/sefardi.png" alt="" width="120px" height="160px" style="margin-top: -50px;">
	</div>
	<div align="center" style="padding-top: 10px;">
		<h3>SEFARDÍ RESTAURANT & SPORT BAR</h3>
		<h4 style="padding-top: -20px;">J-40317369-9</h4>
		<h4 style="padding-top:-15px">Dirección: Centro Comercial Paseo Estación Central.<br>
		Maracay – Edo. Aragua.<br>
		Teléfono: 0243 – 2477782</h4>
	</div>
	<center><h3>Datos personales del empleado: {{ $empleado->nombres }}</h3></center>
	<table border="1">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Cedula o RIF</th>
				<th>Telefono</th>
				<th>Correo Electrónico</th>
			</tr>
		</thead>
		<tbody>
			<tr align="center">
				<td>{{ $empleado->codigo }}</td>
				<td>{{ $empleado->nombres }}</td>
				<td>{{ $empleado->apellidos }}</td>
				<td>{{ $empleado->dni_cedula}}</td>
				<td>{{ $empleado->Phone }}</td>
				<td>{{ $empleado->correo }}</td>
			</tr>
			
		</tbody>
	</table>
	
	<table border="1" class="mitad">
		<thead>
		<tr align="center">
			<th>Dirección</th>
		</tr>
		</thead>
		<tbody>
			<tr align="center">
				<td>
					Ciudad {{ $empleado->ciudad}} Av. o C/ {{ $empleado->calle }} {{ $empleado->habitacion }}
				</td>
			</tr>
		</tbody>
	</table>
	
	<center><h3>Datos laborales</h3></center>

	<table border="1">
		<thead>
			<tr>
				<th>Fecha de admisión</th>
				<th>Tipo de contrato</th>
				<th>Duración</th>
				<th>Cestaticket</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $empleado->info->fecha_de_admision }}</td>
				<td>{{ $empleado->info->contrato }}</td>
				<td>{{ $empleado->info->duración }}</td>
				<td>{{ $empleado->info->cestaticket }}</td>
			</tr>
		</tbody>
	</table>

	<center><h3>Datos Bancarios</h3></center>

	<table border="1">
		<thead>
			<tr>
				<th>Banco</th>
				<th>Tipo de cuenta</th>
				<th>N° de cuenta</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $empleado->info->banco }}</td>
				<td>{{ $empleado->info->cuenta_tipo }}</td>
				<td>{{ $empleado->info->account_em }}</td>
			</tr>
		</tbody>
	</table>
	

</body>
</html>