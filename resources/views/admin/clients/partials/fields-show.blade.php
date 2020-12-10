<div class="col-md-12 text-center">
	<small class="text-center"><strong>Nota:</strong> Los campos marcados con (<span class="text-danger">*</span>) son obligatorios
</div>
</small>
<div class="col-lg-6">
	

		@if(isset($comanda))
			<input type="hidden" name="comanda" value="{{ $comanda }}">
		@endif
		<div class="form-group">
			{!! Form::label('cedula', 'Cédula o Rif') !!}
			{!! Form::text('cedula', $client->dni_cedula, ['class' => 'form-control not-enable', 'title' => 'Número de cedula', 'disabled']) !!}

			@if ($errors->has('cedula'))
	            <span class="help-block">
	                <small>{{ $errors->first('cedula') }}</small>
	           	</span>
	        @endif
		</div>
</div>
<div class="col-lg-12">
<hr>
</div>
<div class="col-lg-12">

	<div class="form-group has-feedback">
		{!! Form::label('nombre', 'Nombre o Razon social',['class' => 'control-label']) !!} <small class="text-danger">*</small>
		{!! Form::text('nombre', null, ['class' => 'form-control nombre requerido', 'placeholder' => 'Ej. Alfredo Jesús', 'title' => 'Introduzca su nombre', 'required', 'disabled']) !!}


            <span class="help-block">
                <em><small></small></em>
           	</span>

	</div>
	<div class="form-group has-feedback">
		{!! Form::label('telefono', 'Teléfono') !!} <small class="text-danger">*</small>
		<div class="form-inline has-feedback form-group">
			{!! Form::select('operadora', array('Seleccione', '0412' => '0412', '0424' => '0424', '0416' => '0416', '0414' => '0414', '0426' => '0426'), null, ['class' => 'form-control', 'disabled']) !!}

			{!! Form::text('telefono', null, [ 'maxlength' => '7', 'class' => 'form-control telefono awesome requerido numerico', 'placeholder' => 'Ej. 4968557', 'maxlength' => '7', 'title' => 'Introduzca su número de teléfono', 'required', 'disabled']) !!}


	            <span class="help-block">
	                <em><small></small></em>
	           	</span>


        </div>
	</div>
	<div class="form-group has-feedback">
		{!! Form::label('correo', 'E-mail') !!} <small class="text-danger">*</small>
		{!! Form::text('correo', null, ['class' => 'form-control requerido correo', 'placeholder' => 'Ej. nombre@mail.com', 'title' => 'Introduzca su correo electrónico', 'required', 'disabled']) !!}
            <span class="help-block">
                <em><small></small></em>
           	</span>

	</div>

	<p><strong>Datos de dirección</strong><hr></p>
	<div class="form-group has-feedback ">

		
		{!! Form::label('ciudad', 'Ciudad') !!} <small class="text-danger">*</small>
		{!! Form::text('ciudad', null, ['class' => 'form-control requerido', 'placeholder' => 'Ej. Cagua', 'title' => 'Introduzca en nombre de la cuidad', 'required', 'disabled']) !!}

		
            <span class="help-block">
                <em><small></small></em>
           	</span>
        
	</div>
	<div class="form-group has-feedback ">
		
		{!! Form::label('Av. C/', 'Av. C/') !!} <small class="text-danger">*</small>
		{!! Form::text('calle', null, ['class' => 'form-control requerido', 'placeholder' => 'Ej. Calle 5 de marzo', 'title' => 'Introduzca el nombre de la calle o avenida', 'required', 'disabled']) !!}

		
            <span class="help-block">
                <em><small></small></em>
           	</span>
        
	</div>

	<div class="form-group has-feedback ">
		
		{!! Form::label('habitacion', 'Numero de casa, apartamento') !!} <small class="text-danger">*</small>
		{!! Form::text('habitacion', null, ['class' => 'form-control requerido', 'placeholder' => 'Ej. Apartamento 08-04', 'title' => 'Introduzca el numero de habitación', 'required', 'disabled']) !!}

		
            <span class="help-block">
                <em><small></small></em>
           	</span>
        
	</div>

	<br>
	<div class="form-group tooltip-demo text-center hide">
		<button class="btn btn-default btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Guardar">
			<span class="glyphicon glyphicon-floppy-saved fa-2x"></span>
		</button>
		
		<a class="btn btn-default btn-sm" data-toggle="tooltip" title="" data-original-title="Cancelar" href="{{ url('admin/clientes') }}">

			<span class="glyphicon glyphicon-floppy-remove fa-2x"></span>
		</a>
	    <br>
	</div>
</div>
