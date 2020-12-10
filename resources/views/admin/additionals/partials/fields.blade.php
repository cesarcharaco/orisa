<div class="col-lg-4">
	<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
		{!! Form::label('nombre', 'Nombre') !!} <span class="text-danger">*</span>
		{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ejm: Sanción disiplinaria', 'title' => 'Introduzca el nombre de la deducción o asignación']) !!}

		@if ($errors->has('nombre'))
            <span class="help-block">
                <em><small>{{ $errors->first('nombre') }}</small></em>
           	</span>
        @endif
	</div>
	<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
		{!! Form::label('modo_pago', 'Modo de pago') !!} <span class="text-danger">*</span>
		{!! Form::select('modo_pago', ['D' => 'DÍA', 'P' => 'PORCENTAJE', 'V' => 'VALOR'] , null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE', 'title' => 'Introduzca el modo de pago para la deducción o asignación', 'id' => 'modo', 'required' => 'required']) !!}

		@if ($errors->has('nombre'))
            <span class="help-block">
                <em><small>{{ $errors->first('nombre') }}</small></em>
           	</span>
        @endif
	</div>
</div>
<div class="col-lg-4">
	<div class="form-group{{ $errors->has('prenomina') ? ' has-error' : '' }}">
		{!! Form::label('prenomina', 'Prenómina') !!} <span class="text-danger">*</span>
		<select name="prenomina" title="Seleccion la prenómina que corresponde esta asignación" class="form-control" placeholder="SELECCIONE">
			 <option value="" disabled selected>SELECCIONE</option>
			@foreach($prenominas as $prenomina)
				<option value="{{ $prenomina->id }}"> {{ $prenomina->full_dates }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group{{ $errors->has('valor') ? ' has-error' : '' }}">
		{!! Form::label('valor', 'Valor') !!} <span class="text-danger">*</span>
		{!! Form::number('valor', null, ['class' => 'form-control', 'placeholder' => '', 'title' => '', 'id' => 'valor', 'disabled' => 'disabled', 'required' => 'required']) !!}

		@if ($errors->has('valor'))
            <span class="help-block">
                <em><small>{{ $errors->first('valor') }}</small></em>
           	</span>
        @endif
	</div>
</div>
<div class="col-lg-4">
	<div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
		{!! Form::label('tipo', 'Caractegoría') !!} <span class="text-danger">*</span>
		{!! Form::select('tipo', ['A' => 'ASIGNACIÓN', 'D' => 'DEDUCCIÓN'] , null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE', 'title' => 'Seleccione la categoría si es deducción o asignación']) !!}

		@if ($errors->has('tipo'))
            <span class="help-block">
                <em><small>{{ $errors->first('tipo') }}</small></em>
           	</span>
        @endif
	</div>
	<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
		{!! Form::label('descripcion', 'Descripción') !!} <span class="text-danger">*</span>
		{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ejm: Le falto el respeto al personal', 'title' => 'Descripción']) !!}

		@if ($errors->has('descripcion'))
            <span class="help-block">
                <em><small>{{ $errors->first('descripcion') }}</small></em>
           	</span>
        @endif
	</div>
</div>