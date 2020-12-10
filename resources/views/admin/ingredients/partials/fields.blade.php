@if($providers)
    <div class="form-group has-feedback">
        {!! Form::label('id_providers', 'Proveedores') !!} <small class="text-danger">*</small>
        {!! Form::select('id_providers[]', $providers, null, ['class' => 'form-control select-providers form-control', 'multiple', 'required']) !!}
    </div>
    <hr>
@endif

<div class="form-group{{ $errors->has('ingrediente') ? ' has-error' : '' }} has-feedback">
    {!! Form::label('ingrediente', 'Nombre') !!} <small class="text-danger">*</small>
    {!! Form::text('ingrediente', null, ['class' => 'form-control requerido', 'placeholder' => 'Harina P.A.N', 'title' => 'Ingrese el ingrediente', 'required']) !!}

    
        <span class="help-block">
            <em><small></small></em>
        </span>
    
</div>
<div class="form-group{{ $errors->has('id_type') ? ' has-error' : '' }} has-feedback">
    {!! Form::label('id_type', 'Categoría') !!} <small class="text-danger">*</small>
    {!! Form::select('id_type', $ingredients_types, null, ['placeholder' => 'Seleccione', 'class' => 'form-control select', 'required']) !!}

    
        <span class="help-block">
            <em><small></small></em>
        </span>
    
</div>
<div class="form-group{{ $errors->has('id_unit') ? ' has-error' : '' }} has-feedback">
    {!! Form::label('id_unit', 'Unidad de medida') !!} <small class="text-danger">*</small>
    {!! Form::select('id_unit', $units, null, ['placeholder' => 'Seleccione', 'class' => 'form-control select', 'required']) !!}

    
        <span class="help-block">
            <em><small></small></em>
        </span>
   
</div>
<div class="form-group{{ $errors->has('caracteristica') ? ' has-error' : '' }} has-feedback">
    {!! Form::label('caracteristica', 'Característica') !!} <small class="text-danger">*</small>
    {!! Form::text('caracteristica', null, ['class' => 'form-control requerido', 'placeholder' => 'Maíz blanco', 'title' => 'Introduzca una característica del producto', 'required']) !!} 

    
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