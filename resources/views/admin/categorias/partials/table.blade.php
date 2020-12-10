
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>                 
    @foreach($categorias_licor as $categoria)
        <tr>
            <td>
                <a href="{{ route('admin.categorias.edit', [$categoria->id]) }}">
                    {{ $categoria->id }}
                </a>
            </td>
            <td>
                <a href="{{ route('admin.categorias.edit', [$categoria->id]) }}">
                    {{ $categoria->tipo_licor }}
                </a>
            </td>
            <td>
                Licor
            </td>                      
            <td class="text-center tooltip-demo">                     
                <a class="btn btn-default btn-xs" href="{{ route('admin.categorias.edit', $categoria->id) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar"><span class="glyphicon glyphicon-pencil fa-x"></span></a>
            
                
            </td>             
        </tr>
    @endforeach 

    @foreach($categorias_ingredientes as $categoria)
        <tr>
            <td>
                <a href="{{ route('admin.clientes.edit', [$categoria->id]) }}">
                    {{ $categoria->id }}
                </a>
            </td>
            <td>
                <a href="{{ route('admin.clientes.edit', [$categoria->id]) }}">
                    {{ $categoria->tipo_ingrediente }}
                </a>
            </td>
            <td>
                Ingrediente
            </td>                      
            <td class="text-center tooltip-demo">                     
                <a class="btn btn-default btn-xs" href="{{ route('admin.categorias.edit', $categoria->id) }}" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar"><span class="glyphicon glyphicon-pencil fa-x"></span></a>
                
            </td>             
        </tr>
    @endforeach                         
    </tbody>
</table>