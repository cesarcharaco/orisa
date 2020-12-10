<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Correo</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
	@foreach($users as $user)
		<tr>
			<td>
				{{ $user->id }}
			</td>
			<td>
				{{ $user->first_name }}
			</td>
			<td>
				{{ $user->last_name }}
			</td>
			<td>
				{{ $user->email }}
			</td>
			<td class="text-center tooltip-demo">
				<!--<a class="btn btn-default btn-xs" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Ver"><span class="glyphicon glyphicon-eye-open fa-x"></span></a>-->
				<a class="btn btn-default btn-xs" href="{{ route('admin.usuarios.edit', $user->id) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar"><span class="glyphicon glyphicon-pencil fa-x"></span></a>
				<a class="btn btn-default btn-xs" href="{{ route('admin.usuarios.destroy', $user->id) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Eliminar"><span class="glyphicon glyphicon-trash fa-x"></span></a>
			</td>
		</tr>
	@endforeach													 
	</tbody>
</table>