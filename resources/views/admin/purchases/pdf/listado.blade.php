<!DOCTYPE html>
<html>
<head>
	<title>Listado de proveedores {{ fecha_actual() }}</title>
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
	<center><h3>Listado de ordenes de compra</h3></center>

	<table border="1">
		<thead>
			<tr>
				<th>N°</th>
				<th>Fecha</th>
				<th>Proveedor</th>
				<th>Estatus</th>
				<th>Monto total</th>
			</tr>
		</thead>
		<tbody>
			@foreach($ordenes as $orden)
			<tr>
				<td>00{{ $orden->id }}</td>
				<td>{{ fechaNatural($orden->created_at) }}</td>
				<td>{{ $orden->provider->razon_social }}</td>
				<td>{{ $orden->estatus ? 'Procesada' : 'En espera' }}</td>
				<td>{{ $orden->estatus ?  $orden->total : '' }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>