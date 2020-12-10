<div class="col-md-12">
	<h2><em>Restaurat Sefardí</em></h2>
	<hr>
	<p>{{ $order->provider->rif }}</p>
	<p>{{ $order->provider->razon_social }}</p>
	<p>{{ $order->provider->full_phone }}</p>
	<p>{{ fechaNatural($order->fecha) }}</p>
	<hr>
	<div class="col-md-1"></div>
	<br>
	<div class="col-md-14 center-block">
		<table class="table table-bordered table-hover text-center">
			<thead class="text-center">
				<tr>
					<th>Productos</th>
					<th>Cantidad</th>
					<th>Unidad</th>
					@if($order->estatus)
					<th>Precio (bs)</th>
					<th>Impote (bs)</th>
					@else
					<th>Características</th>
					@endif
				</tr>
			</thead>
			<tbody>
				@foreach($ingredients as $ingredient)
					<tr>
						<td>{{ $ingredient->ingrediente }}</td>
						<td>{{ $ingredient->pivot->cantidad }}</td>
						<td>{{ $ingredient->unit->unidad }}</td>
						@if($order->estatus)
						<td class="text-right">{{ $ingredient->pivot->precio }}</td>
						<td class="text-right">{{ $ingredient->pivot->importe }}</td>
						@else
						<td>{{ $ingredient->caracteristica }}</td>
						@endif
					</tr>
				@endforeach

				@foreach($liqueurs as $liqueur)
					<tr>
						<td>{{ $liqueur->licor }}</td>
						<td>{{ $liqueur->pivot->cantidad }}</td>
						<td>{{ $liqueur->unit->unidad }}</td>
						@if($order->estatus)
						<td class="text-right">{{ $liqueur->pivot->precio }}</td>
						<td class="text-right">{{ $liqueur->pivot->importe }}</td>
						@else
						<td>{{ $liqueur->caracteristica }}</td>
						@endif
					</tr>
				@endforeach

				@foreach($drinks as $drink)
					<tr>
						<td>{{ $drink->bebida }}</td>
						<td>{{ $drink->pivot->cantidad }}</td>
						<td>{{ $drink->unit->unidad }}</td>
						@if($order->estatus)
						<td class="text-right">{{ $drink->pivot->precio }}</td>
						<td class="text-right">{{ $drink->pivot->importe }}</td>
						@else
						<td>{{ $drink->caracteristica }}</td>
						@endif
					</tr>
				@endforeach
			</tbody>
			@if($order->estatus)
			<tfoot>
				<tr class="active">
					<td colspan="4" class="text-right"><span><strong>Total: </strong></span></td>
					<td class="text-right"><strong>{{ $order->total }}</strong></td>
				</tr>
			</tfoot>
			@endif
		</table>
		<div class="row">
			<div class="col-md-12 tooltip-demo text-center">
			<hr>
				@if(!$order->estatus)
					<a class="btn btn-default btn-sm " type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Procesar" href="{{ route('admin.compra.procesar', [$order->id]) }}">
						<span class="glyphicon glyphicon-copy fa-2x"></span>
					</a>
				@endif
				<a class="btn btn-default btn-sm " href="{{ route('admin.compra.pdf', $order->id) }}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="PDF"><span class="glyphicon glyphicon-print fa-2x"></span></a>
			</div>
		</div>
	</div>
</div>