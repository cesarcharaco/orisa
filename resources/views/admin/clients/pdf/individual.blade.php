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
    		width: 75%;
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
	<center><h3>Datos del cliente: {{ $cliente->nombre }}</h3></center>
	<table border="1">
		<thead>
			<tr>
				<th>Nombre o razón social</th>
				<th>Cedula o RIF</th>
				<th>Telefono</th>
				<th>Correo Electrónico</th>
			</tr>
		</thead>
		<tbody>
			<tr align="center">
				<td>{{ $cliente->nombre }}</td>
				<td>{{ $cliente->dni_cedula}}</td>
				<td>{{ $cliente->Phone }}</td>
				
				<td>{{ $cliente->correo }}</td>
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
					Ciudad {{ $cliente->ciudad}} Av. o C/ {{ $cliente->calle }} {{ $cliente->habitacion }}
				</td>
			</tr>
		</tbody>
	</table>

</body>
</html>