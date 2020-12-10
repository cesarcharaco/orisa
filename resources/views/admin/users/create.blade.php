@extends('layouts.app')

@section('contenido')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"></h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
			<li><a href="{{ url('admin/usuarios') }}">Usuarios</a></li>
			<li class="active">Nuevo</li>
		</ol>
	</div>
</div>
<br>
<div>
    @include('flash::message')
</div>
{!! Form::open(['route' => 'admin.usuarios.store', 'method' => 'POST']) !!}
	{{ csrf_field() }}
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading"><em>Nuevo usuario</em></div>
			<div class="panel-body">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#user" data-toggle="tab">USUARIO</a></li>
					<li><a href="#permissions" data-toggle="tab">PERMISOS</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="user">
						@include('admin.users.partials.fields')
					</div>
					<div class="tab-pane" id="permissions">
						@include('admin.users.permissions.permissions-create')
					</div>
					<div class="box-footer">
						<button class="btn btn-default btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Guardar"><span class="glyphicon glyphicon-floppy-saved fa-2x"></span></button>
						<button class="btn btn-default btn-sm" type="reset" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Borrar"><span class="glyphicon glyphicon-floppy-remove fa-2x"></span></button>
						<a class="btn btn-default pull-right btn-sm" href="{{ url('admin/usuarios') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Atras"><span class="glyphicon glyphicon-circle-arrow-left fa-2x"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}

@endsection

@section('js')
<script src="{{ asset('js/usuario-empleado.js')}}"
@endsection
