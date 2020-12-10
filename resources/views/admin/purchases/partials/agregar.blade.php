{!! Form::open(['route' => 'admin.compra.create', 'method' => 'GET', 'id' => 'agregar']) !!}
			
	<div class="row">
		<div class="col-md-8 center-block col-lg-8">
		<h3>Productos de:<small> {{ $provider->razon_social }}</small></h3>
			<p class="text-muted">Seleccione</p>

			<table class="table table-bordered">
				<thead>
				@if($ingredients != '[]')
					<tr>
						<th>Agregar</th>
						<th>Productos</th>
					</tr>
				</thead>
				@endif
				<tbody>
				<input type="hidden" name="id_proveedor" value="{{ $id_proveedor }}">
					
						@foreach($ingredients as $ingredient)
						<tr>
							<td>
								{!! Form::checkbox('add_ingredients[]', $ingredient->id) !!}
							
							</td>
							<td>{{ $ingredient->ingrediente }}</td>
						</tr>		
						@endforeach
					

						@foreach($liqueurs as $liqueur)
						<tr>
							<td>
								{!! Form::checkbox('add_liqueurs[]', $liqueur->id) !!}
							</td>
							<td>{{ $liqueur->licor }}</td>
						</tr>
						@endforeach	

					

					
						@foreach($drinks as $drink)
						<tr>
							<td>
								{!! Form::checkbox('add_drinks[]', $drink->id) !!}
							</td>
							<td>{{ $drink->bebida }}</td>
						</tr>
						@endforeach	

					

				</tbody>
				


			</table>
		</div>
	</div>

	{!! Form::close() !!}