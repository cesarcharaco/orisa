<div class="col-lg-4">
	{!! Form::label('año', 'Año') !!} <small class="text-danger">*</small>
	<div class="form-group{{ $errors->has('año') ? ' has-error' : '' }}">
		{!! Form::select('año', $años, null, ['placeholder' => '', 'class' => 'form-control', 'placeholder' => 'SELECIONE', 'title' => 'Año']) !!}

		@if($errors->has('año'))
			<span class="help-block">
			    <small>{{ $errors->first('año') }}</small>
			</span>
		@endif
	</div>
</div>
<div class="col-lg-4">
	{!! Form::label('mes', 'Mes') !!} <small class="text-danger">*</small>
	<div class="form-group{{ $errors->has('mes') ? ' has-error' : '' }}">
	{!! Form::select('mes', $meses, null, ['placeholder' => '', 'class' => 'form-control', 'placeholder' => 'SELECCIONE','title' => 'Mes']) !!}

		@if($errors->has('mes'))
			<span class="help-block">
				<small>{{ $errors->first('mes') }}</small>
			</span>
		@endif
	</div>
</div>
<div class="col-lg-4">
	{!! Form::label('quincena', 'Quincena') !!} <small class="text-danger">*</small>
	<div class="form-group{{ $errors->has('quincena') ? ' has-error' : '' }}">
		{!! Form::select('quincena', array('1' => '1', '2' => '2'), null, ['placeholder' => '', 'class' => 'form-control', 'placeholder' => 'SELECCIONE', 'title' => 'Quincena']) !!}
							
		@if($errors->has('quincena'))
			<span class="help-block">
				<small>{{ $errors->first('quincena') }}</small>
			</span>
		@endif
	</div>
</div>
<div class="col-lg-12">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td class="text-center">
					<input type="checkbox" id="select_all" title="Marque aquí para añadir a todos los empleados a la prenómina">
				</td>
				<td class="col-md-2">CÉDULA</td>
				<td>NOMBRES</td>
				<td>APELLIDOS</td>
			</tr>
		</thead>
		<tbody>
			@foreach($empleados as $empleado)
				<tr>
					<td class="text-center">
						<input type="checkbox" name="empleados[]" value="{{ $empleado->id }}" title="Marque aquí para añadir al empleado a la prenómina">
						</td>
					<td>{{ $empleado->dni_cedula }}</td>
					<td>{{ $empleado->nombres }}</td>
					<td>{{ $empleado->apellidos }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
				
					