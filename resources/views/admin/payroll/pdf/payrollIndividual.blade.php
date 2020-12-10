<!DOCTYPE html>
<html>
<head>
	<title>{{ mb_strtoupper($nomina->nombre_completo, 'UTF-8') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">

		table {     
            margin: 0 auto;
    		border-collapse: collapse; 
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
    	}
        table td, table th {
            border: 1px solid #ddd;
        }

    	.logo {
    		padding-top: 50px;
    		padding-left: 1%;
    		position:absolute;
    	}

        .text-center {
            text-align: center;
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

    <div class="panel-body">
        <h4 class="text-center"><strong>RECIBO DE PAGO</strong></h4>
        <br>
            <div class="col-lg-8 col-lg-offset-2">
                <table style="border: 1px solid #ddd;">
                    <thead>
                        <tr>
                            <th class="col-md-3">Cédula de identidad:</th>
                            <th>{{ $nomina->cedula }}</th>
                            <th class="col-md-3">Fecha de ingreso</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th class="col-md-3">Apellidos y Nombres</th>
                            <th>{{ $nomina->nombre_completo }}</th>
                            <th class="col-md-3">Sueldo Asignado</th>
                            <th>{{ $nomina->salarioMensual }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col-lg-10 col-lg-offset-1">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Asignaciones</th>
                            <th>Deducciones</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="8"></td>
                            <td>SALARIO</td>
                            <td class="text-center">{{ $nomina->salarioMensual }}</td>
                            <td></td>
                            <td rowspan="8"></td>
                        </tr>
                        <tr>
                            <td>DÍAS TRABAJADOS</td>
                            <td class="text-center">{{ $nomina->diasLaborados }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>DÍAS DE DESCANSO</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>BONIFICACIÓN ADICIONAL</td>
                            <td class="text-center">{{ $nomina->totalAsignacion }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>DÍA FERIADO</td>
                            <td class="text-center">{{ $nomina->feriadosDescanso }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>SEGURO SOCIAL</td>
                            <td></td>
                            <td class="text-center">{{ $nomina->sso }}</td>
                        </tr>
                        <tr>
                            <td>PARO FORZOSO</td>
                            <td></td>
                            <td class="text-center">{{ $nomina->rpe }}</td>
                        </tr>
                        <tr>
                            <td>FAOV</td>
                            <td></td>
                            <td class="text-center">{{ $nomina->rpvh }}</td>
                        </tr>
                    <tr>
                        <td colspan="3"></td>
                        <th class="text-center">TOTAL A PAGAR</th>
                        <td class="text-center">{{ $nomina->totalNeto }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>