@if(!$provider)
{!! Form::open(['route' => 'admin.compra.create', 'method' => 'GET']) !!}
	<div class="col-lg-12">
		<div class="form-group">
			<div class="input-group">
				<div class="form-group">
					<select class="form-control" name="proveedor" title="Seleccione el proveedor" required="">
						<option value="">Seleccione...</option>
						@foreach($providers as $provider)
							<option value="{{ $provider->id }}">
								{{ $provider->razon_social }}
							</option>
						@endforeach
					</select>
					
				</div>
				<span class="input-group-btn">
					<button type="submit" class="btn btn-default" data-toggle="tooltip" type="button" id="buscar" title="Buscar productos">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			 </div>
		</div>
	</div>
{!! Form::close() !!}

@endif

<!-- 
* Listado de productos del proveedor para agregar
-->

<div class="col-md-2"></div>


@if($ingredients AND $ingredients != '[]' || $liqueurs != '[]' || $drinks != '[]')

	@include('admin.purchases.partials.agregar')

@if($provider)
	<div class="row">
		<div class="col-lg-6 col-md-6 text-center" >
			<a class="btn btn-default btn-sm" href="{{ url('admin/compra/create') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Atras">
				<span class="glyphicon glyphicon-circle-arrow-left"></span>
			</a>
		</div>

		<div class="col-md-6 col-lg-6 text-center">

			<button class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Siguiente
			" id="siguiente">
				<span class="glyphicon glyphicon-circle-arrow-right"></span>
			</button>
		</div>
	</div>
@endif	
@endif

<!-- 
* Listado de productos agregados para colocar las cantidades
-->

@if($data_ingredient || $data_liqueur || $data_drink)

 @include('admin.purchases.partials.agregados')

@endif





