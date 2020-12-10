<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>#</th>
			<th>Rif</th>
			<th>Razón Social</th>
			<th>Teléfono</th>
			<th>E-mail</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>										
	@foreach($providers as $provider)
		<tr>
			<td>
				{{ $provider->id }}
			</td>
			<td>
				{{ $provider->rif }}
			</td>
			<td>
				{{ $provider->razon_social }}
			</td>
			<td>
				{{ $provider->operadora.' - '.$provider->telefono }}
			</td>
			<td>
				{{ $provider->correo }}
			</td>
			<td class="text-center tooltip-demo">
				<a class="btn btn-default btn-xs" href="{{ route('admin.proveedores.show', $provider->id) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Ver"><span class="glyphicon glyphicon-eye-open fa-x"></span></a>

				<a class="btn btn-default btn-xs" href="{{ route('admin.compra.create', ['proveedor' => $provider->id]) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Encargo"><span class="glyphicon glyphicon-shopping-cart  fa-x"></span></a>

				<a class="btn btn-default btn-xs" href="{{ route('admin.proveedores.imprimir', $provider->id) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Imprimir"><span class="glyphicon glyphicon-print fa-x"></span></a>

				<a class="btn btn-default btn-xs" href="{{ route('admin.proveedores.edit', $provider) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar"><span class="glyphicon glyphicon-pencil fa-x"></span></a>

				<a class="btn btn-default btn-xs" href="#" type="button" data-toggle="modal" data-target="#verificar" onclick="verificar({{ $provider->id }})"><span class="glyphicon glyphicon-trash fa-x" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Eliminar"></span></a>

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
                        <h4 class="modal-title text-center" class="title">¿Seguro desea eliminar al cliente?</h4>
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