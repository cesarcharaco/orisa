<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th style="width: 40px;">#</th>
			<th>Cédula</th>
			<th>Nombre(s)</th>
			<th>Cargo</th>
			<th>Salario</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>							
	@foreach($nominas as $nomina)
		<tr>
			<td class="text-center">{{ $indice = $indice+1 }}</td>
			<td>{{ $nomina->cedula }}</td>
			<td>{{ $nomina->nombre_completo }}</td>
			<td>{{ $nomina->cargo }}</td>
			<td>{{ $nomina->totalNeto}}</td>
			<td class="col-md-2 text-center">
				<a class="btn btn-default btn-xs" href="{{ route('admin.nomina.pdfI', $nomina->id)}}"><span class="glyphicon glyphicon-print fa-x" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Imprimir"></span></a>
				<a class="btn btn-default btn-xs" href="{{ route('admin.nomina.mostrar', $nomina->id) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Ver"><span class="glyphicon glyphicon-eye-open fa-x"></span></a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>