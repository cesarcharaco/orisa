<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th style="width: 40px;">#</th>
			<th>Año</th>
			<th>Mes</th>
			<th>Quincena</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>							
	@foreach($prenominas as $prenomina)
		<tr>
			<td class="text-center">{{ $indice + 1 }}</td>
			<td>{{ $prenomina->year }}</td>
			<td>{{ $prenomina->mes }}</td>
			<td>{{ $prenomina->quincena }}</td>
			<td class="col-md-3 text-center tooltip-demo">
				@if($prenomina->est == 0)
					<a class="btn btn-default btn-xs" href="{{ route('admin.nomina.show', $prenomina->id) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Ver"><span class="glyphicon glyphicon-eye-open fa-x"></span></a>
				@else
					<a class="btn btn-default btn-xs" href="{{ route('admin.recibo.nomina', $prenomina->id) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Imprimir"><span class="glyphicon glyphicon-print fa-x"></span></a>
					<a class="btn btn-default btn-xs" href="{{ route('admin.nomina.show', $prenomina->id) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar"><span class="glyphicon glyphicon-pencil fa-x"></span></a>
				@endif
				<!--<a class="btn btn-default btn-xs" href="{{ route('admin.usuarios.destroy', $prenomina->id) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Eliminar"><span class="glyphicon glyphicon-trash fa-x"></span></a>-->
			</td>
		</tr>
	@endforeach
	</tbody>
</table>