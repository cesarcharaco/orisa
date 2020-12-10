<div class="col-md-12 text-center">
	<small><strong>Nota:</strong> Los campos marcados con (<span class="text-danger">*</span>) son obligatorios</small>
</div>
<div class="col-lg-6">
	@if(!empty($rif))
		<div class="form-group{{ $errors->has('rif') ? ' has-error' : '' }} has-feedback">
			{!! Form::label('rif', 'RIF') !!}   
			<input type="text" name="rif" value="<?php echo $rif; ?>" class="form-control" disabled>

			<input type="hidden" name="rif" value="<?php echo $rif; ?>">

	        <span class="help-block">
	            <small></small>
	        </span>
		</div>
	@else
		<div class="form-group{{ $errors->has('rif') ? ' has-error' : '' }} has-feedback">
			{!! Form::label('rif', 'RIF') !!}   
			{!! Form::text('rif', null, ['class' => 'form-control', 'title' => 'Número de RIF', 'disabled']) !!}

	            <span class="help-block">
	                <small></small>
	           	</span>
		</div>
	@endif
</div>
<div class="col-lg-12">
<hr>	
</div>
<div class="col-lg-12">
	<div class="form-group{{ $errors->has('razon_social') ? ' has-error' : '' }} has-feedback">
		{!! Form::label('razon_social', 'Nombre') !!} 
		{!! Form::text('razon_social', null, ['class' => 'form-control requerido', 'placeholder' => 'Ej. Alimentos Polar Comercial, C.A', 'title' => 'Introduzca su nombre o razón social']) !!}
        <span class="help-block">
            <em><small></small></em>
       	</span>
	</div>
	<div class="form-group has-feedback">
		{!! Form::label('telefono', 'Teléfono') !!}
		<div class="form-inline has-feedback form-group">	
			{!! Form::select('operadora', array('Seleccione', '0412' => '0412', '0424' => '0424', '0416' => '0416', '0414' => '0414', '0426' => '0426'), null, ['class' => 'form-control', 'required' => 'required']) !!}
			{!! Form::text('telefono', null, ['class' => 'form-control awesome telefono numerico', 'placeholder' => 'Ej. 4968557', 'size' => '40', 'title' => 'Introduzca su número de teléfono','maxlength' => '7', 'required' => 'required']) !!}
            <span class="help-block">
                <em><small></small></em>
           	</span>
        </div>			
	</div>
	<div class="form-group has-feedback"> 
		{!! Form::label('correo', 'E-mail') !!}
		{!! Form::email('correo', null, ['class' => 'form-control correo', 'placeholder' => 'Ej. ejemplo@mail.com', 'title' => 'Introduzca su correo electrónico']) !!}
        <span class="help-block">
            <em><small></small></em>
       	</span>
	</div>
	<p><strong>Datos de dirección</strong><hr></p>
	<div class="form-group has-feedback ">
		{!! Form::label('ciudad', 'Cuidad') !!} 
		{!! Form::text('ciudad', null, ['class' => 'form-control requerido', 'placeholder' => 'Ej. Cagua', 'title' => 'Introduzca la cuidad']) !!}
        <span class="help-block">
            <em><small></small></em>
       	</span>
	</div>
	<div class="form-group has-feedback ">
		{!! Form::label('Av. C/', 'Calle') !!} 
		{!! Form::text('calle', null, ['class' => 'form-control requerido', 'placeholder' => 'Ej. Calle 5 de marzo', 'title' => 'Introduzca la calle o avenida']) !!}
        <span class="help-block">
            <em><small></small></em>
       	</span>
	</div>

	<div class="form-group has-feedback ">
		{!! Form::label('habitacion', 'Numero de oficina, parcela o galpón') !!}
		{!! Form::text('habitacion', null, ['class' => 'form-control requerido', 'placeholder' => 'Ej. 08-04', 'title' => 'Introduzca el numero de habitación']) !!}
        <span class="help-block">
            <em><small></small></em>
        </span>
	</div>
	<br>
	<div class="form-group tooltip-demo text-center">
		<button class="btn btn-default btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Guardar"><span class="glyphicon glyphicon-floppy-saved fa-2x"></span></button>
		<a class="btn btn-default btn-sm" href="{{ url('admin/proveedores') }}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Borrar"><span class="glyphicon glyphicon-floppy-remove fa-2x"></span></a>
	    <br>
	</div> 
</div>