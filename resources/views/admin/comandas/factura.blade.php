<!DOCTYPE html>
<html>
<head>
    <title>Recibo N° 00{{ $comanda->id }}</title>
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
        <h3>SEFARDÍ RESTAURANT & SPORT BAR</h3>
        <h4 style="padding-top: -20px;">J-40317369-9</h4>
        <h4 style="padding-top:-15px">Dirección: Centro Comercial Paseo Estación Central.<br>
        Maracay – Edo. Aragua.<br>
        Teléfono: 0243 – 2477782</h4>
    </div>
    <h3 align="center">Recibo N° 00{{ $comanda->id }}</h3>

    <table border="1">
        <tr>
            <td><strong>Mesa:</strong> N° {{ $comanda->table->id }} </td>
            <td><strong>Empleado:</strong> Alfredo Gonzalez </td>
            <td><strong>Fecha:</strong>{{ fechaNatural($comanda->created_at) }} </td>
        </tr>
        <tr>
            <td><strong>Cliente:</strong> {{ $cliente->nombre }}</td>
            <td><strong>Cedula:</strong> {{ $cliente->dni_cedula }}</td>
            <td></td>
        </tr>
    </table>
    
    <table border="1">
        <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario (bs)</th>
            <th>Importe (bs)</th>
        </tr>
        </thead>
        
        <tbody>
            @include('admin.comandas.partials.invoice.plates')

            @include('admin.comandas.partials.invoice.beverages')

            @include('admin.comandas.partials.invoice.drinks')
            
            @include('admin.comandas.partials.invoice.juices') 
        </tbody>
        <tfoot>
            @include('admin.comandas.partials.invoice.footer')
        </tfoot>
    </table>
</body>
</html>