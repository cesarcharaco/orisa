<div class="col-md-12 text-center">
	<small><strong>Nota:</strong> Los campos marcados con (<span class="text-danger">*</span>) son obligatorios</small>
</div>
<div class="col-lg-12">
	<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }} has-feedback">
		{!! Form::label('nombre', 'Nombre') !!} 
		{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Sanción disiplinaria', 'title' => 'Introduzca el nombre de la deducción']) !!}

		
            <span class="help-block">
                <em><small></small></em>
           	</span>
        
	</div>
	<div class="form-group{{ $errors->has('valor') ? ' has-error' : '' }} has-feedback">
		{!! Form::label('valor', 'Valor') !!} 
		{!! Form::text('valor', null, ['class' => 'form-control', 'placeholder' => 'Ej. 300.00', 'title' => 'Introduzca el valor de la deduccion en Bs.F', 'required']) !!}

		
            <span class="help-block">
                <em><small></small></em>
           	</span>
        
	</div>
	<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }} has-feedback">
		{!! Form::label('descripcion', 'Descripción') !!} 
		{!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '5', 'placeholder' => '', 'title' => 'Descripción ']) !!}

		
            <span class="help-block">
                <em><small></small></em>
           	</span>
        
	</div>
	<br>
	<div class="form-group tooltip-demo text-center">
		<button class="btn btn-default btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Guardar"><span class="glyphicon glyphicon-floppy-saved fa-2x"></span></button>
		<button class="btn btn-default btn-sm" type="reset" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Borrar"><span class="glyphicon glyphicon-floppy-remove fa-2x"></span></button>
	    <br>
	</div> 
</div>