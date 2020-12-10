@if($providers)
    <div class="form-group{{ $errors->has('id_providers') ? ' has-error' : '' }} has-feedback">
    	{!! Form::label('id_providers', 'Proveedores') !!} <small class="text-danger">*</small>
    	{!! Form::select('id_providers[]', $providers, null, ['class' => 'form-control select-providers form-control requerido', 'multiple', 'required', 'disabled']) !!}

        
            <span class="help-block">
                <em><small></small></em>
            </span>
        
    </div>
    <hr>
@endif

<div class="form-group{{ $errors->has('bebida') ? ' has-error' : '' }} has-feedback">
	{!! Form::label('bebida', 'Nombre') !!} <small class="text-danger">*</small>
	{!! Form::text('bebida', null, ['class' => 'form-control requerido', 'placeholder' => 'Yukery', 'title' => 'Ingrese el nombre de la bebida', 'required', 'disabled']) !!}

	
        <span class="help-block">
            <em><small></small></em>
    	</span>
    
</div>
<div class="form-group{{ $errors->has('id_unit') ? ' has-error' : '' }} has-feedback">
	{!! Form::label('id_unit', 'Unidad de medida') !!} <small class="text-danger">*</small>
	{!! Form::select('id_unit', $units, null, ['placeholder' => 'Seleccione', 'class' => 'form-control select', 'required', 'disabled']) !!}

	
        <span class="help-block">
            <em><small></small></em>
    	</span>
    
</div>
<div class="form-group{{ $errors->has('caracteristica') ? ' has-error' : '' }} has-feedback">
	{!! Form::label('caracteristica', 'Característica') !!} <small class="text-danger">*</small>
    {!! Form::text('caracteristica', null, ['class' => 'form-control requerido', 'placeholder' => 'Jugos Yuky-Pak', 'title' => 'Introduzca una característica del producto', 'required', 'disabled']) !!} 

    
        <span class="help-block">
            <em><small></small></em>
    	</span>
    
</div>
<br>
<div class="form-group tooltip-demo text-center hide">
	<button class="btn btn-default btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Guardar"><span class="glyphicon glyphicon-floppy-saved fa-2x"></span></button>
	<a class="btn btn-default btn-sm" href="{{ url('admin/bebidas') }}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Cancelar"><span class="glyphicon glyphicon-floppy-remove fa-2x"></span></a>
	<br>
</div> 