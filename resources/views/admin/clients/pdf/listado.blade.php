<!DOCTYPE html>
<html>
<head>
	<title>Listado de clientes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">

		table {     
    		border-collapse: collapse;
    		padding: 10;
    		width: 100%;
    		text-align: center;
    	}
    	.mitad{
    		width: 75%;
    	}
		
		.f-pequena{
			font-size: 13px;
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
	<center><h3>Listado de clientes</h3></center>
	<table border="1" class="f-pequena">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Cedula</th>
				<th>Telefono</th>
				<th>Correo</th>
				<th>Dirección</th>
			</tr>
		</thead>
		<tbody>
			@foreach($clientes as $cliente)
			<tr>
				<td>{{ $cliente->nombre }}</td>
				<td>{{ $cliente->dni_cedula }}</td>
				<td>{{ $cliente->Phone }}</td>
				<td>{{ $cliente->correo }}</td>
				<td>{{ $cliente->direccion }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>