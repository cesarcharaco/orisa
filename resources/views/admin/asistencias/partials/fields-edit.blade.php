<div class="col-lg-6">
	@if($asistencia)
		<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
			{!! Form::label('nombre', 'Nombre') !!}   
			{!! Form::text('nombre', $asistencia->personal->full_name, ['class' => 'form-control', 'title' => 'Nombre del empleado', 'disabled']) !!}

			@if ($errors->has('nombre'))
	            <span class="help-block">
	                <small>{{ $errors->first('nombre') }}</small>
	           	</span>
	        @endif
		</div>
	@endif
</div>
<div class="col-lg-12">
<hr>	
</div>
<div class="col-lg-6">
	<div class="form-group{{ $errors->has('hora_entrada') ? ' has-error' : '' }}">
		{!! Form::label('entrada', 'Entrada') !!} 
		{!! Form::time('hora_entrada', null, ['class' => 'form-control', 'title' => 'Introduzca la hora de entrada', 'id' => 'hora_entrada', 'disabled' => 'disabled']) !!}

		@if ($errors->has('hora_entrada'))
            <span class="help-block">
                <em><small>{{ $errors->first('hora_entrada') }}</small></em>
           	</span>
        @endif
	</div>
</div>
<div class="col-lg-6">
	<div class="form-group{{ $errors->has('hora_salida') ? ' has-error' : '' }}">
		{!! Form::label('salida', 'Salida') !!} 
		{!! Form::time('hora_salida', null, ['class' => 'form-control', 'title' => 'Introduzca la hora de salida', 'id' => 'hora_salida', 'disabled' => 'disabled']) !!}

		@if ($errors->has('hora_salida'))
            <span class="help-block">
                <em><small>{{ $errors->first('hora_salida') }}</small></em>
           	</span>
        @endif
	</div>
</div>
<div class="col-lg-12">
	<div class="form-group{{ $errors->has('motivo') ? ' has-error' : '' }}"> 
		{!! Form::label('motivo', 'Motivo') !!}
		{!! Form::select('motivo', ['Libre' => 'LIBRE', 'Asistio' => 'ASISTIO', 'No Asistio' => 'NO ASISTIO'], null, ['class' => 'form-control laboran', 'placeholder' => 'SELECCIONE', 'required' => 'required', 'id' => 'motivo', 'onchange' => 'desbloquearAss()']) !!}

		@if ($errors->has('motivo'))
            <span class="help-block">
                <em><small>{{ $errors->first('motivo') }}</small></em>
           	</span>
        @endif
	</div>
	<div class="form-group">
		{!! Form::label('justificacion', 'Justificación') !!} 
	    <label class="radio-inline">
	        <input type="radio" name="justificacion" id="optionsRadiosInline1" value="S">SI
	    </label>
	    <label class="radio-inline">
            <input type="radio" name="justificacion" id="optionsRadiosInline2" value="N" checked>NO
        </label>
    </div>
	<div class="form-group{{ $errors->has('razon') ? ' has-error' : '' }}">
		{!! Form::textarea('razon', null, ['class' => 'form-control', 'rows' => '5', 'placeholder' => '', 'title' => 'Describa la razón de la inasistencia', 'disabled' => 'disabled', 'id' => 'razon']) !!}

		@if ($errors->has('razon'))
            <span class="help-block">
                <em><small>{{ $errors->first('razon') }}</small></em>
           	</span>
        @endif
	</div>
	<br>
	<div class="form-group tooltip-demo text-center">
		<button class="btn btn-default btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Guardar"><span class="glyphicon glyphicon-floppy-saved fa-2x"></span></button>

		<a class="btn btn-default btn-sm" href="{{ url('admin/empleados') }}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Cancelar"><span class="glyphicon glyphicon-floppy-remove fa-2x"></span></a>
	    <br>
	</div> 
</div>