<div class="col-lg-3">
    <div class="form-group{{ $errors->has('unidad_tributaria') ? ' has-error' : '' }}">
        {!! Form::label('unidad_tributaria', 'Unidad tributaria') !!} <small class="text-danger">*</small>
        {!! Form::number('unidad_tributaria', null, ['class' => 'form-control', 'title' => 'Introduzca el valor actual de la unidad tributaria', 'placeholder' => 'Ejm: 150', 'min' => '1']) !!}

        @if($errors->has('unidad_tributaria'))
            <span class="help-block">
                <em>{{ $errors->first('unidad_tributaria') }}</em>
            </span>
        @endif
    </div>
</div>
<div class="col-lg-12">
    <hr>
    <div class="form-group tooltip-demo text-center">
        <button class="btn btn-default btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Guardar"><span class="glyphicon glyphicon-floppy-saved fa-2x"></span></button>
        <button class="btn btn-default btn-sm" type="reset" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Cancelar"><span class="glyphicon glyphicon-floppy-remove fa-2x"></span></button>
        <br>
    </div>  
</div>            
