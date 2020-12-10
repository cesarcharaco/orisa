<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>#</th>
            <th>Unidad tributaria</th>
            <th>Cantidad</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
	    <tr>
            <td> 
                {{ $indice }} 
            </td>
            <td> 
                {{ $cestaticket->unidad_tributaria }} 
            </td>
            <td> 
                {{ $cestaticket->cantidad }}
            </td>
            <td style="width: 200px;" class="text-center"> 
                <a class="btn btn-default btn-xs" href="{{ route('admin.cestaticket.edit', $cestaticket->id) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar"><span class="glyphicon glyphicon-pencil fa-x"></span></a>
                <a class="btn btn-default btn-xs" href="{{ route('admin.cestaticket.destroy', $cestaticket->id) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Eliminar"><span class="glyphicon glyphicon-trash fa-x"></span></a>
            </td>
	   </tr>          
    </tbody>
</table>