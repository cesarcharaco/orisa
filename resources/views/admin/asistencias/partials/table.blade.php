<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>#</th>
            <th>Empleado</th>
            <th>Turno</th>
            <th>Fecha</th>
            <th>Entrada</th>
            <th>Salida</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody> 
        @foreach($asistencias as $asistencia)
            <tr class="text-center">
                <td style="width: 50px;">{{ $indice = $indice+1 }}</td>
                <td class="text-left">{{ $asistencia->personal->full_name }}</td>
                <td>{{ $asistencia->personal->turno->turno }}</td>
                <td>{{ fechaInicio($asistencia->attendays->fecha) }}</td>
                @if($asistencia->motivo == 'Asistio')
                <td>{{ $asistencia->hora_entrada }}</td>
                <td>{{ $asistencia->hora_salida }}</td>
                @elseif($asistencia->motivo == 'Libre')
                <td>LIBRE</td>
                <td>LIBRE</td>
                @else
                <td>NO ASISTIO</td>
                <td>NO ASISTIO</td>
                @endif
                <td class="text-center tooltip-demo">                     
                    <a class="btn btn-default btn-xs" href="{{ route('admin.asistencias.edit', [$asistencia->id]) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar"><span class="glyphicon glyphicon-pencil fa-x"></span></a>
                    <a href="{{ route('admin.asistencia.destroy', [$asistencia->id]) }}" class="btn btn-default btn-xs" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Eliminar"><span class="glyphicon glyphicon-trash fa-x"></span></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>