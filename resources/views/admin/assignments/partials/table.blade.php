<table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
    <thead>
        <tr>
            <th>#</th>
            <th>Turno</th>
            <th>Entrada</th>
            <th>Salida</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody> 
    @foreach($turns as $turns)
            <tr>
                <td class="col-md-1">
                    {{ $turns->id }}
                </td>
                <td class="col-md-3"> 
                    {{ $turns->turno }}
                </td>
                <td class="col-md-3"> 
                    {{ $turns->hora_entrada }}
                </td>
                <td class="col-md-3"> 
                    {{ $turns->hora_salida }}
                </td>
                <td class="text-center tooltip-demo">
                    <a class="btn btn-default btn-xs" href="{{ route('admin.asignaciones.edit', $turns) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar"><span class="glyphicon glyphicon-pencil fa-x"></span></a>
                    <a class="btn btn-default btn-xs" href="" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Eliminar"><span class="glyphicon glyphicon-trash fa-x"></span></a>
                </td>
            </tr> 
    @endforeach
    </tbody>
</table>                                    
