<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>#</th>
            <th>Cédula</th>
            <th>Nombres</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>                 
    @foreach($clients as $client)
        <tr>
            <td>
                {{ $client->id }}
            </td>
            <td>
                {{ $client->dni_cedula }}
            </td>
            <td>
                {{ $client->nombre }}
            </td>
            <td>
                {{ $client->operadora }}-{{ $client->telefono }}
            </td>                      
            <td class="text-center tooltip-demo"> 
                <a class="btn btn-default btn-xs" href="{{ route('admin.clientes.imprimir', $client) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Imprimir"><span class="glyphicon glyphicon-print fa-x"></span></a>

                <a class="btn btn-default btn-xs" href="{{ route('admin.clientes.show', $client) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Ver"><span class="glyphicon glyphicon-eye-open fa-x"></span></a>


                <a class="btn btn-default btn-xs" href="{{ route('admin.clientes.edit', $client) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar"><span class="glyphicon glyphicon-pencil fa-x"></span></a>
                

                <a class="btn btn-default btn-xs" data-toggle="tooltip" title="Eliminar" data-placement="bottom" onclick="verificar({{ $client->id}})">
                    <span class="glyphicon glyphicon-trash fa-x" data-toggle="modal" data-target="#verificar"></span>
                </a>
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
                {!! Form::open(['route' => ['admin.clientes.destroy', 0133], 'method' => 'DELETE']) !!}
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