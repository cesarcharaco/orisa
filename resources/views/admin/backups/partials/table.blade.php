<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr>
        <th>ARCHIVO</th>
        <th>TAMAÑO</th>
        <th>FECHA</th>
        <th>ACCIONES</th>
    </tr>
    </thead>
    <tbody>
    @foreach($backups as $backup)
        <tr>
            <td>
                {{ $backup['file_name'] }}
            </td>
            <td>
               {{ $backup['file_size'] }} KB
            </td>
            <td>
                {{ $backup['last_modified'] }}
            </td>
            <td class="text-center">
                <!--<a class="btn btn-default btn-xs" href="{{ route('backup.download', $backup['file_name']) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Descargar"><span class="glyphicon glyphicon-download-alt fa-x"></span></a>-->
                <a class="btn btn-default btn-xs" href="{{ route('backup.restore', $backup['file_name']) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Restaurar"><span class="glyphicon glyphicon-open fa-x"></span></a>
                <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" onclick="eliminar('{{ $backup['file_name'] }}')" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Eliminar"><span class="glyphicon glyphicon-trash fa-x"></span></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="row">            
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">ELIMINAR RESPALDO</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que deseea eliminar este respaldo en especifico...?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    {!! Form::open(['route' => ['backup.destroy', 0133], 'method' => 'DELETE']) !!}
                    {!! Form::token() !!}
                        <input type="hidden" id="backup" name="id">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>    
    </div>
</div>