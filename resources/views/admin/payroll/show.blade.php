@extends('layouts.app')

@section('contenido')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"></h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
			<li class="active">Prenómina</li>
			<li class="active">Mostrar</li>
		</ol>
	</div>
</div>
<br>
<div>
    @include('flash::message')
</div>
{!! Form::open(['route' => 'admin.nomina.guardar', 'method' => 'POST']) !!}
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
		            <em>Prenómina de la {{ $prenomina->full_dates }}</em>
		        </div>
		        <div class="panel-body">
		            @include('admin.payroll.partials.fields-show')

                    <div class="form-group tooltip-demo text-center">
                        <button class="btn btn-default btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Guardar"><span class="glyphicon glyphicon-floppy-saved fa-2x"></span></button>
                        <button class="btn btn-default btn-sm" type="reset" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Cancelar"><span class="glyphicon glyphicon-floppy-remove fa-2x"></span></button>
                    </div>
		        </div>
		    </div>
		</div>
	</div>
{!! Form::close() !!}

<div class="row">            
    <div class="modal fade" id="myModalA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">AGREGAR ASIGNACIÓN</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que deseea agregar esta asignación a este empleado en especifico...?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    {!! Form::open(['route' => 'admin.asignaciones_extras.store', 'method' => 'POST']) !!}
                    {!! Form::token() !!}
                        <input type="hidden" id="empleadoA" name="empleado">
                        <input type="hidden" id="adicionalA" name="adicional">
                        <input type="hidden" id="prenominaA" name="prenomina">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>    
    </div>
</div>

<div class="row">            
    <div class="modal fade" id="myModal2A" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">ELIMINAR ASIGNACIÓN</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que deseea eliminar esta asignación a este empleado en especifico...?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    {!! Form::open(['route' => ['admin.asignaciones_extras.destroy', '0133'], 'method' => 'DELETE']) !!}
                    {!! Form::token() !!}
                        <input type="hidden" id="empleado_id" name="id_empleado">
                        <input type="hidden" id="adicional_id" name="id_adicional">
                        <input type="hidden" id="prenomina_id" name="id_prenomina">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>    
    </div>
</div>


<div class="row">            
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">AGREGAR DEDUCCIÓN</h4>
                </div>
                <div class="modal-body">
            		¿Esta seguro que deseea agregar esta deducción a este empleado en especifico...?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    {!! Form::open(['route' => 'admin.deducciones_extras.store', 'method' => 'POST']) !!}
                    {!! Form::token() !!}
                    	<input type="hidden" id="empleado" name="empleado">
                    	<input type="hidden" id="adicional" name="adicional">
                    	<input type="hidden" id="prenomina" name="prenomina">
                    	<button type="submit" class="btn btn-primary">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>    
    </div>
</div>

<div class="row">            
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">ELIMINAR DEDUCCIÓN</h4>
                </div>
                <div class="modal-body">
            		¿Esta seguro que deseea eliminar esta deducción a este empleado en especifico...?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    {!! Form::open(['route' => ['admin.deducciones_extras.destroy', '0133'], 'method' => 'DELETE']) !!}
                    {!! Form::token() !!}
                    	<input type="hidden" id="id_empleado" name="id_empleado">
                    	<input type="hidden" id="id_adicional" name="id_adicional">
                    	<input type="hidden" id="id_prenomina" name="id_prenomina">
                    	<button type="submit" class="btn btn-primary">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>    
    </div>
</div>

<script type="text/javascript">
    //ASIGNAGIONES

    function agregarA(empleado, adicional, prenomina)
    {
        $('#empleadoA').val(empleado);
        $('#adicionalA').val(adicional);
        $('#prenominaA').val(prenomina);

    }

    function eliminarA(empleado, adicional, prenomina)
    {
        $('#empleado_id').val(empleado);
        $('#adicional_id').val(adicional);
        $('#prenomina_id').val(prenomina);

    }
    
    //DEDUCCIONES

    function agregarD(empleado, adicional, prenomina)
    {
        $('#empleado').val(empleado);
        $('#adicional').val(adicional);
        $('#prenomina').val(prenomina);

    }

    function eliminarD(empleado, adicional, prenomina)
    {
        $('#id_empleado').val(empleado);
        $('#id_adicional').val(adicional);
        $('#id_prenomina').val(prenomina);

    }
</script>

@endsection