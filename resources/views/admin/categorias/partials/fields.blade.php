<label class="control-label">Tipo de Categoria</label> <small class="text-danger">*</small>
  
<div class="form-group">	
<label class="radio-inline">
    <input type="radio" name="tipo" id="optionsRadios2" value="1" title="Seleccione el tipo de categoria" required="">

    Licor
  </label>


  <label class="radio-inline">
    <input type="radio" name="tipo" id="optionsRadios2" value="0" title="Seleccione el tipo de categoria" required="">
   	Ingrediente
  </label>

  <span class="help-block">
            <em><small></small></em>
    	</span>
    
</div>

<div class="form-group{{ $errors->has('bebida') ? ' has-error' : '' }} has-feedback">
	{!! Form::label('nombre', 'Nombre', ['class' => 'control-label']) !!} <small class="text-danger">*</small>
	{!! Form::text('nombre', null, ['class' => 'form-control requerido', 'placeholder' => 'Ej. Pescado', 'title' => 'Ingrese el nombre de la categoria', 'required']) !!}

	
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