@extends('layouts.app')

@section('contenido')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/nominas/guardadas') }}"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">Nómina</li>
                <li class="active">Ver</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nómina individual
                </div>
                <div class="panel-body">
                    <h4 class="text-center"><strong>RECIBO DE PAGO</strong></h4>
                    <br>
                    <div class="col-lg-8 col-lg-offset-2">
                        <table class="table table-striped table-bordered">
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
                                    <th>#####</th>
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
        </div>
    </div>


@endsection