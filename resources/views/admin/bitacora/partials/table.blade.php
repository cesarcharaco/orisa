<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>Usuario</th>

			<th>Operacion</th>
      <th>Fecha</th>
      <th>Hora</th>
		</tr>
	</thead>
	<tbody>
	@foreach($operaciones as $operacion)
    <tr>

      <td> Administrador </td>

      <td>{{ $operacion->descripcion }} {{$operacion->operacion}}</td>
      <td>{{ fecha($operacion->created_at) }}</td>
      <td>{{ hora($operacion->created_at) }}</td>
    </tr>
  @endforeach
