<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>#</th>
			<th>Licor</th>
			<th>Categoría</th>
			<th>Característica</th>
			<th>Stock</th>
			<th>Unidad</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($liqueurs as $liqueur)
			<tr>
				<td>
					<a href="{{ route('admin.licores.edit', $liqueur) }}">
						{{ $liqueur->id }}
					</a>
				</td>
				<td>
					<a href="{{ route('admin.licores.edit', $liqueur) }}">
					{{ $liqueur->licor }}
				</td>
				<td>
					<a href="{{ route('admin.licores.edit', $liqueur) }}">
						{{ $liqueur->type->tipo_licor }}
					</a>
				<td>
					<a href="{{ route('admin.licores.edit', $liqueur) }}">
						{{ $liqueur->caracteristica }}
					</a>
				</td>
				<td>
					<a href="{{ route('admin.licores.edit', $liqueur) }}">
						{{ $liqueur->stock }}
					</a>
				</td>
				<td>
					<a href="{{ route('admin.licores.edit', $liqueur) }}">
						{{ $liqueur->unit->unidad }}
					</a>
				</td>
				<td class="text-center tooltip-demo">
					<a class="btn btn-default btn-xs" href="{{ route('admin.licores.show', $liqueur->id) }}" type="button" ><span class="glyphicon glyphicon-eye-open fa-x" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Ver"></span></a>

					<a class="btn btn-default btn-xs" href="{{ route('admin.licores.edit', $liqueur) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar"><span class="glyphicon glyphicon-pencil fa-x"></span></a>

					<a class="btn btn-default btn-xs" href="#" onclick="verificar({{ $liqueur->id }})"><span class="glyphicon glyphicon-trash fa-x" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Eliminar"></span></a>
				</td>
			</tr>
		@endforeach												 
	</tbody>
</table>
<!-- INICIO MODAL -->
            <div class="modal fade" id="verificar" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" class="title">Ingrese su contraseña</h4>
                    </div>
                <div class="modal-body" >
                    <div class="form-group">
                       <input type="password" name="password"  class="form-control" id="clave" maxlength="16">
                    </div>
                    <div id="msj"></div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    
                    <button class="btn btn-primary" id="confirmar" type="button">Confirmar</button>
                </div>
                </div>
                </div>
                </div>
            </div>
<!--  FIN MODAL -->


<!-- INICIO MODAL -->
            <div class="modal fade" id="eliminar" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" class="title">¿Seguro desea eliminar el licor?</h4>
                    </div>
                <div class="modal-body text-center">
                    
                        De hacerlo se perderan todos los datos del mismo
                        
                </div>
                <div class="modal-footer text-center">
                {!! Form::open(['route' => ['admin.proveedores.destroy', 0133], 'method' => 'DELETE']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    {{ csrf_field() }}
                    <input type="hidden" id="eliminar_id" name="id">
                    <button class="btn btn-primary">Eliminar</button>
                {!! Form::close() !!}
                </div>
                </div>
                </div>
                </div>
            </div>
<!--  FIN MODAL -->