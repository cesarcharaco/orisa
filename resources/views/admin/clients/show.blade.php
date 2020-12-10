@extends('layouts.app')

@section('contenido')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"></h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
			<li><a href="{{ url('admin/clientes') }}">Clientes
			 </a></li>
			<li class="active">Ver</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		@include('flash::message')
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
	            <em>Cliente: <strong>{{ $client->nombre }}</strong></em>

				<a href="" class="btn btn-default btn-xs pull-right editar" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar"> 
					<span class="fa fa-pencil fa-2x"></span> 
				</a>
			</div>

			{{ Form::model($client, ['route' => ['admin.clientes.update', $client->id], 'method' => 'PUT']) }}
	        	<div class="panel-body">

					@include('admin.clients.partials.fields-show')

	        	</div>
	        {{ Form::close() }}
	    </div>
	 </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/editar-menu.js') }}"></script>
<script src="{{ asset('js/validaciones.js') }}"></script>
@endsection

