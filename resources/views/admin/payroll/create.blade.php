@extends('layouts.app')

@section('contenido')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"></h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
			<li class="active">Prenómina</li>
			<li class="active">Nuevo</li>
		</ol>
	</div>
</div>
<div>
    @include('flash::message')
</div>
{!! Form::open(['route' => 'admin.nomina.store', 'method' => 'POST']) !!} {{ csrf_field() }}

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
		            Añadir empleados a la quincena
		            <small class="text-center pull-right"><strong>Nota:</strong> Los campos marcados con (<span class="text-danger">*</span>) son obligatorios</small>
		        </div>
		        <div class="panel-body">
		        	
					@include('admin.payroll.partials.fields')
					<div class="form-group tooltip-demo text-center">
		          		<button class="btn btn-default btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Guardar"><span class="glyphicon glyphicon-floppy-saved fa-2x"></span></button>
		          		<button class="btn btn-default btn-sm" type="reset" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Borrar"><span class="glyphicon glyphicon-floppy-remove fa-2x"></span></button>
		          	</div>
		        </div>
		    </div>
		</div>
	</div>

{!! Form::close() !!}

@endsection