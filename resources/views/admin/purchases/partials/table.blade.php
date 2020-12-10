<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>#</th>
			<th>Proveedor</th>
			<th>Fecha</th>
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>								
	@foreach($orders as $key => $order)
		<tr>
			<td>
				00{{ $order->id }}
			</td>
			<td>
				{{ $order->provider->razon_social }}		  
			</td>
			<td>
				{{ fechaNatural($order->fecha) }}
			</td>
			<td class="text-center">
				<span class="label {!! $order->estatus == 0 ? 'label-warning' : 'label-success' !!}">
					{{ $order->estatus == 0 ? 'En espera' : 'Recibido'}}
				</span>
			</td>
			<td class="text-center tooltip-demo">
				<a class="btn btn-default btn-xs" href="{{ route('admin.compra.show', $order->id) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Ver"><span class="glyphicon glyphicon-eye-open fa-x"></a>
				@if(!$order->estatus)
					<a class="btn btn-default btn-xs " type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Procesar" href="{{ route('admin.compra.procesar', [$order->id]) }}"><span class="glyphicon glyphicon-copy fa-x"></span></a>
				@endif 					  
				<a class="btn btn-default btn-xs " href="{{ route('admin.compra.pdf', $order->id) }}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="PDF"><span class="glyphicon glyphicon-print fa-x"></span></a>
				<a class="btn btn-default btn-xs" href="{{ route('admin.compra.destroy', $order->id) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Eliminar"><span class="glyphicon glyphicon-trash fa-x"></span></a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
