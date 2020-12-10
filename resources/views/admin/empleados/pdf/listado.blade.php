<!DOCTYPE html>
<html>
<head>
	<title>Listado de empleados</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">

		table {     
    		border-collapse: collapse;
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
	<center><h3>Listado de empleados</h3></center>
<table border="1">
	<thead>
		<tr>
			<th>Codigo</th>
			<th>Nombre y apellido</th>
			<th>Cedula</th>
			<th>Telefono</th>
			<th>Dirección</th>
		</tr>
	</thead>
	<tbody>
	@foreach($empleados as $empleado)
		<tr>
			<td>{{ $empleado->info->codigo }}</td>
			<td>{{ $empleado->fullName }}</td>
			<td>{{ $empleado->dni_cedula }}</td>
			<td>{{ $empleado->phone }}</td>
			<td>{{ $empleado->direccion }}</td>
		</tr>
	@endforeach
	</tbody>
</table>
</body>
</html>