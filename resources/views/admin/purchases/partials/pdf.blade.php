<!DOCTYPE html>
<html>
<head>
    <title>Orden de compra N° 00{{ $orden->id }}</title>
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

        .logo {
            padding-top: 50px;
            padding-left: 7%;
            position: absolute;
        }

        .fecha {
            position: absolute;
            float: right;
            font-size: 13px;
            font-style: none;
        }
    </style>
</head>
</head>
<body>
    <div class="logo">
        <img src="img/logo/sefardi.png" alt="" width="120px" height="160px" style="margin-top: -50px;">
    </div>
    <div align="center" style="padding-top: 10px;">
        <h3>SEFARDÍ RESTAURANT & SPORT BAR <span class="fecha">{{ fecha_actual() }}</span></h3>
        <h4 style="padding-top: -20px;">J-40317369-9</h4>
        <h4 style="padding-top:-15px">Dirección: Centro Comercial Paseo Estación Central.<br>
        Maracay – Edo. Aragua.<br>
        Teléfono: 0243 – 2477782</h4>
    </div>
    <h3 align="center">Orden de compra N° 00{{ $orden->id }}</h3>
	<table border="1">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Unidad</th>
                @if($orden->estatus)
                <th>Precio (bs)</th>
                <th>Importe (bs)</th>
                @endif
            </tr>
        </thead>
        <tbody>
                @foreach($ingredientes as $ingrediente)
            <tr>
                <td>{{ $ingrediente->ingrediente }}</td>
                <td>{{ $ingrediente->pivot->cantidad }}</td>
                <td>{{ $ingrediente->unit->unidad  }}</td>
                @if($orden->estatus)
                <td>{{ $ingrediente->pivot->precio }}</td>
                <td>{{ $ingrediente->pivot->importe }}</td>
                @endif
            </tr>
                @endforeach

                @foreach($licores as $licor)
            <tr>
                <td>{{ $licor->licor }}</td>
                <td>{{ $licor->pivot->cantidad }}</td>
                <td>{{ $ingrediente->unit->unidad  }}</td>
                @if($orden->estatus)
                <td>{{ $ingrediente->pivot->precio }}</td>
                <td>{{ $ingrediente->pivot->importe }}</td>
                @endif
            </tr>
                @endforeach
                 @foreach($ingredientes as $ingrediente)
            <tr>
                <td>{{ $ingrediente->ingrediente }}</td>
                <td>{{ $ingrediente->pivot->cantidad }}</td>
                <td>{{ $ingrediente->unit->unidad  }}</td>
                @if($orden->estatus)
                <td>{{ $ingrediente->pivot->precio }}</td>
                <td>{{ $ingrediente->pivot->importe }}</td>
                @endif
            </tr>
                @endforeach
        </tbody>
        @if($orden->estatus)
        <tfoot>
            <tr>
                <td colspan="4" align="right"><strong>Total</strong></td>
                <td><strong>{{ $orden->total }}</strong></td>
            </tr>
        </tfoot>
        @endif
    </table>
    <br><br><br>
    <table>
        <tr>
            <td align="right">Realizada por: <u>&nbsp;&nbsp;&nbsp; {{  currentUser()->first_name }} &nbsp;&nbsp;&nbsp;</u></td>
        </tr>
    </table>
</body>
</html>