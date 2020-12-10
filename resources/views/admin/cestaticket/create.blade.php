@extends('layouts.app')

@section('contenido')

	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header"></h1>
	        <ol class="breadcrumb">
	            <li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
	            <li><a href="{{ url('admin/cestaticket') }}">Cestaticket</a></li>
	            <li class="active">Nuevo</li>
	        </ol>
	    </div>
	</div>

	<div>
	    @include('flash::message')
	</div>

	{{ Form::open(['route' => 'admin.cestaticket.store', 'method' => 'POST']) }}    
		{{ csrf_field() }}
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <em>Editar</em>
	                </div>
	                <div class="panel-body">
	                    @include('admin.cestaticket.partials.fields')
	                </div>
	            </div>
	        </div>
	    </div>
	{!! Form::close() !!}

@endsection
