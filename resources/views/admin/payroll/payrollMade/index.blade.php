@extends('layouts.app')

@section('contenido')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"></h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
			<li class="active">Nómina</li>
			<li class="active">Inicio</li>
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
                <em>Registro de nominas guardadas</em>
            </div>
            <div class="panel-body">
                @include('admin.payroll.partials.tableN')
           	</div>
        </div>
    </div>
</div>


@endsection