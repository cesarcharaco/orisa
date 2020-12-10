<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>#</th>
            <th>Día</th>
            <th>Estatus</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dias as $dia)
	    <tr>
            <td> 
                {{ $dia->id }} 
            </td>
            <td> 
                {{ fechaInicio($dia->dia) }}
            </td>
            <td> 
                {{ $dia->estatus }}
            </td>
            <td class="text-center tooltip-demo">                     
                <a class="btn btn-default btn-xs" href="{{ route('admin.planificaciones.administrar.dias.edit', $dia->id) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar"><span class="glyphicon glyphicon-pencil fa-x"></span></a>
            </td>
	   </tr>
        @endforeach           
    </tbody>
</table>