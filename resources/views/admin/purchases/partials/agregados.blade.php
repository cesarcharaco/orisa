{!! Form::open(['route' => 'admin.compra.store', 'method' => 'POST']) !!} {{ csrf_field() }}

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		<hr>
		<h3>Productos agregados<small> {{ $provider->razon_social }}
		</small></h3>
		<p class="text-muted center-block">Cantidades</p>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Producto</th>
					<th>Cantidad</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
			<input type="hidden" name="id_proveedor" value="{{ $id_proveedor }}">
				@if($data_ingredient)

					@foreach($data_ingredient as $key => $ingredient)
				<tr>
				<td>
				{{$ingredient->id}}
					
					<input type="hidden" name="ingredients[]" value="{{ $ingredient->id }}">
				</td>
					<td>{{ $ingredient->ingrediente }}</td>
					<td>
					<div class="input-group has-feedback">
		
						{!! Form::text('cantidad_ingredient[]', null, ['class' => 'form-control  numerico requerido', 'placeholder' => 'Cantidad', 'title' => 'Ingrese la cantidad del ingrediente para la orden', 'required' => 'required', 'maxlength' => '5']) !!}

						<span class="input-group-addon">
						@foreach($units_i as $key2 => $unit)
							@if($key2 == $key)
								@foreach($unit as $key3 => $unidad)									
								
									{{ $unidad->unidad }}
							
								@endforeach
							@endif
						@endforeach
						</span>
					</div>
					</td>
				
					
					
				</tr>
					@endforeach

				@endif

	<!-- -------------------------- Lista de licores ----------------------------- -->

				@if($data_liqueur)

					@foreach($data_liqueur as $key => $liqueur)
				<tr>
				<td>
				{{$liqueur->id}}
					
					<input type="hidden" name="liqueurs[]" value="{{ $liqueur->id }}">
				</td>
					<td>{{ $liqueur->licor }}</td>
					<td>
					<div class="input-group has-feedback">
		
						{!! Form::text('cantidad_liqueur[]', null, ['class' => 'form-control requerido numerico', 'placeholder' => 'Cantidad', 'title' => 'Ingrese la cantidad del licor para la orden', 'required' => 'required', 'maxlength' => '5']) !!}

						<span class="input-group-addon">
						@foreach($units_l as $key2 => $unit)
							@if($key2 == $key)
								@foreach($unit as $key3 => $unidad)	

									{{ $unidad->unidad }}

								@endforeach
							@endif
						@endforeach
						</span>
					</div>
					</td>
				
					
					
				</tr>
					@endforeach

				@endif

				<!-- -------------------------- Lista de bebidas fabricadas -------- -->

				@if($data_drink)

					@foreach($data_drink as $key => $drink)
						<tr>
							<td>
								{{$drink->id}}
								<input type="hidden" name="drinks[]" value="{{ $drink->id }}">
							</td>
							<td>
								{{ $drink->bebida }}
							</td>
							<td>
								<div class="input-group">
				
									{!! Form::text('cantidad_drink[]', null, ['class' => 'form-control requerido numerico', 'placeholder' => 'Cantidad', 'title' => 'Ingrese la cantidad del licor para la orden', 'required' => 'required', 'maxlength' => '5']) !!}
									<span class="input-group-addon">
										@foreach($units_d as $key2 => $unit)
											@if($key2 == $key)
												@foreach($unit as $key3 => $unidad)		

													{{ $unidad->unidad }}

												@endforeach
											@endif
										@endforeach
									</span>
								</div>
							</td>
						
							
							
						</tr>
					@endforeach

				@endif

			</tbody>
		</table>
		<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">	
			 <br>
            <div class="form-group tooltip-demo text-center">
                <button class="btn btn-default btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Guardar"><span class="glyphicon glyphicon-floppy-saved fa-2x"></span></button>
                <button class="btn btn-default btn-sm" type="reset" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Borrar"><span class="glyphicon glyphicon-floppy-remove fa-2x"></span></button>
                <br>
            </div> 
		</div>
	</div>




{!! Form::close() !!}