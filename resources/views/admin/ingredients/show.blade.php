@extends('layouts.app')

@section('contenido')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"></h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
			<li><a href="{{ route('admin.ingredientes.index') }}">Ingredientes</a></li>
			<li class="active">Ver</li>
		</ol>
	</div>
</div>
<br>
<div>
    @include('flash::message')
</div>
{{ Form::model($ingredient, ['route' => ['admin.ingredientes.update', $ingredient->id], 'method' => 'PUT']) }}
	{{ csrf_field() }}
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
		            <em>Editar Ingrediente <strong>{{ $ingredient->ingrediente }}</strong></em>

		            <a href="#" class="btn btn-default btn-xs pull-right editar" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar"> <span class="fa fa-pencil fa-x"></span> </a>
		        </div>
		        <div class="panel-body">
		            @include('admin.ingredients.partials.fields-view')
		        </div>
		    </div>
		</div>
	</div>
{!! Form::close() !!}

@endsection

@section('js')
<script src="{{ asset('js/editar-menu.js') }}"></script>
<script src="{{ asset('js/validaciones.js ')}}"></script>
@endsection