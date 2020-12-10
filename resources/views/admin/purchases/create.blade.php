@extends('layouts.app')

@section('contenido')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"></h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
			<li ><a href="{{ url('admin/compra') }}">Orden de compra</a></li>
			<li class="active">Nuevo</li>
		</ol>
	</div>
</div>
<br>
<div>
    @include('flash::message')
</div>
<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
	            <em>Registro de Orden de compra</em>
	        </div>
	        <div class="panel-body">
	            @include('admin.purchases.partials.fields')
	        </div>
	    </div>
	</div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/validaciones.js') }}"></script>

<script>
	var boton = document.getElementById('siguiente');
	console.log(boton);
	boton.addEventListener('click', function(){
		document.getElementById('agregar').submit();
	});
</script>
@endsection