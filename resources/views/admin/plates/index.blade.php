@extends('layouts.app')

@section('contenido')

 <!-- Page Content -->
<div class="row">
	<div class="col-lg-12">
		<h5 class="page-header"></h5>
	</div>
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
			<li class="active">Platos</li>
		</ol>
	</div>
	<div class="col-lg-4">
		<a  href="{{ url('admin/platos/create') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Nuevo">
			<span class="fa fa-plus"></span>
		</a><br><br>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		@include('flash::message')
	</div>
</div>

<div class="row">
	@foreach($plates as $plate)
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body text-center" style="overflow: hidden;">
					<img src="../img/plates/{{ $plate->image->imagen }}" class="img-responsive" style="margin: 0 auto; max-height: 100px !important;">
				</div>
				<div class="panel-footer">
					{{ ucwords(strtolower($plate->plato)) }}

					<a href="{{route('admin.platos.show', $plate->id)}}" class="btn btn-default btn-xs pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ver"> <span class="glyphicon glyphicon-eye-open fa-x"></span> </a>
				</div>
			</div>
		</div>
	@endforeach
</div>


@endsection


