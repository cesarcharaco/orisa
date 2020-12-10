@extends('layouts.app')

@section('contenido')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"></h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
			<li><a href="{{ url('admin/proveedores') }}">Proveedores</a></li>
			<li class="active">Ver</li>
		</ol>
	</div>
</div>
<br>
<div>
    @include('flash::message')
</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
		            <em>Editar: {{ $provider->razon_social }}</em>

		            <a href="" class="btn btn-default btn-xs pull-right editar" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar"> <span class="fa fa-pencil fa-x"></span> </a>
		        </div>
		      	{{ Form::model($provider, ['route' => ['admin.proveedores.update', $provider->id], 'method' => 'PUT']) }}
		        <div class="panel-body">
		            @include('admin.providers.partials.fields-view')
		        </div>
				{!! Form::close() !!}
		    </div>
		</div>
	</div>

@endsection

@section('js')
<script src="{{ asset('js/editar-menu.js') }}"></script>
<script src="{{ asset('js/validaciones.js') }}"></script>
@endsection