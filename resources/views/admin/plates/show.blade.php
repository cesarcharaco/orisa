@extends('layouts.app')

@section('contenido')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"></h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
			<li><a href="{{ url('admin/platos') }}">Platos </a></li>
			<li class="active">Ver</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		@include('flash::message')
	</div>
</div>
{{ Form::open(['route' => ['admin.platos.update', $plate->id], 'method' => 'PUT']) }}
<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
		            <em>Plato: <strong>{{ $plate->plato}}</strong></em>
								<a href="#" class="btn btn-default btn-xs pull-right editar" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar"> <span class="fa fa-pencil fa-x"></span> </a>
						</div>
		        <div class="panel-body">
		        <div class="row">
			        <div class="col-lg-2 col-md-3">
			        	<img src="{{asset('img/plates')}}/{{ $plate->image->imagen }}" alt="" class="img-responsive">
			        </div>
			        <div class="col-md-9">
			        	<strong>Plato: </strong>
			        	{{$plate->plato}}
			        	<br><br>
			        	<strong>Precio: </strong>
			        	{{$plate->precio}} bs
			        	<br><br>
			        	<strong>Descripción: </strong>
			        	{{$plate->descripcion}}
			        </div>
		        </div>

		        <div class="row">
		        	<div class="col-md-8"><br>
								<h4>Lista de ingredientes</h4>
		        		<table class="table table-bordered table-condensed">
		        			<thead>
		        				<tr>
											<th>#</th>
		        					<th>Ingrediente</th>
		        					<th>Cantidad</th>
		        				</tr>
		        			</thead>
		        			<tbody>
		        				@foreach($ingredientes as $key => $ingrediente)
										<tr>
											<td>
												{{ $key + 1 }}
												<input name="ingrediente_id[]" type="hidden" value="{{ $ingrediente->id }}">
												<input name="units[]" value="{{ $unidades_ingredientes[$key]->id }}" type="hidden">
											</td>
											<td>{{$ingrediente->ingrediente}}</td>
											<td>
												<div class="col-xs-5 input-group">
													<input name="cantidad_i[]" class="cantidad form-control input-sm" id="{{ $ingrediente->id }}" type="number" value="{{ $ingrediente->pivot->cantidad_ingrediente }}" disabled>

													<span class="input-group-addon">
														{{ $unidades_ingredientes[$key]->unidad }}
													</span>
												</div>
											</td>
										</tr>
		        				@endforeach
		        			</tbody>
		        		</table>
		        	</div>
		        </div>

						@if($licores != '[]')
						<div class="row">
							<div class="col-md-8">
								<h4>Lista de Licores</h4>
								<table class="table table-bordered table-condensed">
									<thead>
										<tr>
											<th>#</th>
											<th>Licor</th>
											<th>Cantidad</th>
										</tr>

									</thead>
									<tbody>
										@foreach($licores as $key => $licor)
										<tr>
											<td>{{ $key + 1 }}</td>
											<td>
												{{ $licor->licor }}
												<input name="units_l[]" value="{{ $unidades_licores[$key]->id }}" type="hidden">
											</td>
											<td>
												<div class="col-xs-5 input-group">
													<input name="cantidad_l[]" class="cantidad form-control input-sm" disabled type="number" value="{{ $licor->pivot->cantidad_licor }}">

													<span class="input-group-addon">
														{{ $unidades_licores[$key]->unidad }}
													</span>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						@endif

						@if($salsas != '[]')
						<div class="row">
							<div class="col-md-8">
								<h4>Lista de Salsas</h4>
								<table class="table table-bordered table-condensed">
									<thead>
										<tr>
											<th>#</th>
											<th>Salsa</th>
										</tr>

									</thead>
									<tbody>
											@foreach($salsas as $key => $salsa)
											<tr>
												<td>{{ $key + 1 }}</td>
												<td>{{ $salsa->salsa }}</td>
											</tr>
											@endforeach
									</tbody>
								</table>
							</div>
						</div>
						@endif

						<div class="row hide">
							<div class="col-md-12">
								<div class="form-group tooltip-demo text-center">
									<button class="btn btn-default btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Guardar"><span class="glyphicon glyphicon-floppy-saved fa-2x"></span></button>
								</div>
							</div>
						</div>

					</div>  <!-- Panel body -->
		    </div>
		</div>
</div>
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('js/editar-menu.js')}}"></script>
@endsection
