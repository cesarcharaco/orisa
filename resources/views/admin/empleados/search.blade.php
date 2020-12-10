@extends('layouts.app')


@section('contenido')

<div class="row">
	<div class="col-lg-12">
			<h5 class="page-header"></h5>
	</div>
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="{{ url('tablero') }}"><span class="glyphicon glyphicon-home"></span></a></li>
			<li><a href="{{ route('admin.empleados.index') }}">Empleados</a></li>
			<li class="active">Buscar</li>
		</ol>
	</div>
</div>
<br>
<div>
    @include('flash::message')
</div>
{!! Form::open(['route' => 'admin.empleados.create', 'method' => 'GET', 'class' => 'form-inline']) !!} 
<div class="row"> 
	<div class="col-lg-6 col-lg-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<em>Cédula de Identidad</em>
			</div>
			<div class="panel-body">
				<div class="row">       
					@include('admin.empleados.partials.fields-search')
				</div>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('js/validaciones.js') }}"></script>
@endsection