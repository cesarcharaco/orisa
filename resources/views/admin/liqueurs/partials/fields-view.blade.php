@if($providers)
    <div class="form-group{{ $errors->has('id_providers') ? ' has-error' : '' }} has-feedback">
    	{!! Form::label('id_providers', 'Proveedores') !!} <small class="text-danger">*</small>
    	{!! Form::select('id_providers[]', $providers, null, ['class' => 'form-control select-providers form-control requerido', 'multiple', 'required']) !!}

        
            <span class="help-block">
                <em><small></small></em>
            </span>
        
    </div>
    <hr>
@endif

<div class="form-group{{ $errors->has('licor') ? ' has-error' : '' }} has-feedback">
	{!! Form::label('licor', 'Nombre') !!} <small class="text-danger">*</small>
	{!! Form::text('licor', null, ['class' => 'form-control requerido', 'placeholder' => 'Belvedere', 'title' => 'Introduzca el nombre del licor', 'required','disabled']) !!}

	
        <span class="help-block">
            <em><small></small></em>
    	</span>
   
</div>
<div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }} has-feedback">
	{!! Form::label('tlicor_id', 'Categoría') !!} <small class="text-danger">*</small>
	{!! Form::select('type_id', $liqueurs_types, null, ['placeholder' => 'Seleccione', 'class' => 'form-control requerido select', 'required','disabled']) !!}
	
	
        <span class="help-block">
            <em><small></small></em>
    	</span>
   
</div>
<div class="form-group{{ $errors->has('id_unit') ? ' has-error' : '' }} has-feedback">
	{!! Form::label('id_unit', 'Unidad de medida') !!} <small class="text-danger">*</small>
	{!! Form::select('id_unit', $units, null, ['placeholder' => 'Seleccione', 'class' => 'form-control requerido select', 'required','disabled']) !!}

	
        <span class="help-block">
            <em><small></small></em>
    	</span>
    
</div>
<div class="form-group{{ $errors->has('caracteristica') ? ' has-error' : '' }} has-feedback">
	{!! Form::label('caracteristica', 'Característica') !!} <small class="text-danger">*</small>
    {!! Form::text('caracteristica', null, ['class' => 'form-control requerido', 'placeholder' => 'Pomelo rosa', 'title' => 'Introduzca una característica del producto', 'required','disabled']) !!} 

    
        <span class="help-block">
            <em><small></small></em>
    	</span>
    
</div>
<br>
<div class="form-group tooltip-demo text-center hide">
	<button class="btn btn-default btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Guardar"><span class="glyphicon glyphicon-floppy-saved fa-2x"></span></button>
	<button class="btn btn-default btn-sm" type="reset" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Borrar"><span class="glyphicon glyphicon-floppy-remove fa-2x"></span></button>
	<br>
</div> 
