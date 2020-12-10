<div class="col-md-12 text-center">
    <small><strong>Nota:</strong> Los campos marcados con (<span class="text-danger">*</span>) son obligatorios</small>
</div>
@if($dni_cedula)
    <div class="col-lg-4">
        <div class="form-group{{ $errors->has('dni_cedula') ? ' has-error' : '' }}">
            {!! Form::label('document_em', 'Cédula') !!} <small class="text-danger">*</small>
            {!! Form::text('dni_cedula', $dni_cedula, ['class' => 'form-control', 'disabled']) !!}
            {!! Form::hidden('dni_cedula', $dni_cedula) !!}


                <span class="help-block">
                    <small></small>
                </span>

        </div>
    </div>
@else
    <div class="col-lg-4">
        <div class="form-group{{ $errors->has('dni_cedula') ? ' has-error' : '' }} has-feedback">
            {!! Form::label('document_em', 'Cédula') !!}
            {!! Form::text('dni_cedula', null, ['class' => 'form-control', 'disabled', 'required']) !!}

                <span class="help-block">
                    <small></small>
                </span>
        </div>
    </div>
@endif
<div class="col-lg-12">
<hr>
</div>

<div class="col-lg-4">

<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }} has-feedback">
        {!! Form::label('names_em', 'Nombres') !!} <small class="text-danger">*</small>
        {!! Form::text('nombres', null, ['class' => 'form-control requerido', 'placeholder' => 'Ej. José Gregorio', 'required']) !!}


            <span class="help-block">
                <small></small>
            </span>

    </div>

    <div class="form-group has-feedback">
        {!! Form::label('telefono', 'Teléfono') !!} <small class="text-danger ">*</small>
        <div class="form-inline has-feedback form-group">
            {!! Form::select('operadora', array('Seleccione','0412' => '0412', '0424' => '0424', '0416' => '0416', '0414' => '0414', '0426' => '0426'), null, ['class' => 'form-control requerido']) !!}
            {!! Form::text('telefono', null, [ 'maxlength' => '7', 'class' => 'form-control telefono awesome requerido numerico', 'placeholder' => 'Ej. 4968557', 'size' => '6', 'title' => 'Introduzca su número de teléfono', 'required']) !!}
                <span class="help-block">
                    <em><small></small></em>
                </span>
        </div>
    </div>



</div>

<div class="col-lg-4">
    <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }} has-feedback">
        {!! Form::label('surnames_em', 'Apellidos') !!} <small class="text-danger">*</small>
        {!! Form::text('apellidos', null, ['class' => 'form-control requerido', 'placeholder' => 'Ej. Martínez Pérez', 'required']) !!}
            <span class="help-block">
                <small></small>
            </span>
    </div>

    <div class="form-group{{ $errors->has('genero') ? ' has-error' : '' }} has-feedback">
        {!! Form::label('gender_em', 'Género') !!} <small class="text-danger">*</small>
        {!! Form::select('genero', array('' => 'Seleccione', 'Masculino' => 'Masculino', 'Femenino' => 'Femenino'), null, ['class' => 'form-control select', 'required']) !!}
        <span class="help-block">
            <small></small>
        </span>
    </div>

</div>


<div class="col-lg-4">
     <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }} has-feedback">
        {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!} <small class="text-danger">*</small>
        {!! Form::text('fecha_nacimiento', null, ['class' => 'form-control', 'required', 'id' => 'datepicker']) !!}
        <span class="help-block">
            <small></small>
        </span>
    </div>

     <div class="form-group{{ $errors->has('estado_civil') ? ' has-error' : '' }} has-feedback">
        {!! Form::label('civil_status_em', 'Estado civil') !!} <small class="text-danger">*</small>
        {!! Form::select('estado_civil', array('' => 'Seleccione', 'Soltero/a' => 'Soltero/a', 'Comprometido/a' => 'Comprometido/a', 'casado/a' => 'Casado/a', 'Divorciado/a' => 'Divorciado/a', 'Viudo/a' => 'Viudo/a'), null, ['class' => 'form-control select', 'required']) !!}
        <span class="help-block">
            <small></small>
        </span>
    </div>


</div>
<div class="col-lg-12">
    <h5 class="page-header"><b>DATOS DE DIRECCIÓN</b></h5>
</div>
<div class="col-md-4">
 <div class="form-group has-feedback">
        {!! Form::label('ciudad', 'Cuidad') !!}
        {!! Form::text('ciudad', null, ['class' => 'form-control requerido', 'placeholder' => 'Ej. Cagua', 'title' => 'Introduzca la cuidad']) !!}
        <span class="help-block">
            <em><small></small></em>
        </span>
    </div>
</div>
<div class="col-md-4">
<div class="form-group has-feedback ">
        {!! Form::label('calle', 'Av. C/') !!}
        {!! Form::text('calle', null, ['class' => 'form-control requerido', 'placeholder' => 'Ej. Calle 5 de marzo', 'title' => 'Introduzca la calle o avenida']) !!}
            <span class="help-block">
                <em><small></small></em>
            </span>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group has-feedback ">
        {!! Form::label('habitacion', 'Numero de casa o apartamento') !!}
        {!! Form::text('habitacion', null, ['class' => 'form-control requerido', 'placeholder' => 'Ej. 08-04', 'title' => 'Introduzca el numero de habitación']) !!}
        <span class="help-block">
            <em><small></small></em>
        </span>
    </div>
</div>

<div class="col-lg-12">
    <h5 class="page-header"><b>DATOS DE TRABAJO</b></h5>
</div>

@if($empleado)

    <div class="col-lg-4">
        <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }} has-feedback">
            {!! Form::label('cargo_id', 'Cargo') !!} <small class="text-danger">*</small>
            {!! Form::select('cargo_id', $cargos, null, ['class' => 'form-control', 'required']) !!}

                <span class="help-block">
                    <small></small>
                </span>

        </div>

        <div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }} has-feedback">
            {!! Form::label('code_em', 'Código del empleado') !!} <small class="text-danger">*</small>
            {!! Form::text('codigo', $value = $empleado->info->codigo, ['class' => 'form-control requerido', 'placeholder' => 'EM-0004256', 'required']) !!}


                <span class="help-block">
                    <small></small>
                </span>

        </div>
         <div class="form-group{{ $errors->has('contrato') ? ' has-error' : '' }} has-feedback">
            {!! Form::label('contract_status', 'Contrato') !!} <small class="text-danger">*</small>
            {!! Form::select('contrato', array('' => 'Seleccione', 'Determinado' => 'Determinado', 'Indeterminado' => 'Indeterminado'), $value = $empleado->info->contrato, ['class' => 'form-control requerido', 'id' => 'contrato', 'required']) !!}


                <span class="help-block">
                    <small>
           </small></span>
        </div>

        <div class="form-group{{ $errors->has('duracion') ? ' has-error' : '' }} has-feedback">
            {!! Form::label('duracion', 'Duración') !!}
            {!! Form::number('duracion', $empleado->info->duracion, ['placeholder' => '30', 'class' => 'form-control', 'id' => 'duracion', 'disabled' => 'disabled']) !!}


                <span class="help-block">
                    <small></small>
                </span>

        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group{{ $errors->has('fecha_de_admision') ? ' has-error' : '' }} has-feedback">
            {!! Form::label('date_of_admission', 'Fecha de ingreso') !!} <small class="text-danger">*</small>
            {!! Form::text('fecha_de_admision', $value = $empleado->info->fecha_de_admision, ['class' => 'form-control', 'required', 'id' => 'fecha_admision']) !!}


                <span class="help-block">
                    <small></small>
                </span>

        </div>
        <div class="form-group{{ $errors->has('turno') ? ' has-error' : '' }} has-feedback">
            {!! Form::label('turno_id', 'Turno') !!} <small class="text-danger">*</small>
            {!! Form::select('turno_id', $turnos, null, ['class' => 'form-control', 'required']) !!}


                <span class="help-block">
                    <small></small>
                </span>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group{{ $errors->has('cestaticket') ? ' has-error' : '' }} has-feedback">
            {!! Form::label('cestaticket', 'Cestaticket') !!} <small class="text-danger">*</small>
            {!! Form::select('cestaticket', array('' => 'Seleccione', 'Sí' => 'Si', 'No' => 'No'), $value = $empleado->info->cestaticket, ['class' => 'form-control select', 'required']) !!}


                <span class="help-block">
                    <small></small>
                </span>

        </div>

    </div>
    <div class="col-lg-12">
        <h5 class="page-header"></h5>
    </div>

    <div class="col-lg-4">
        <div class="form-group has-feedback">
            {!! Form::label('bank', 'Banco') !!}

            {!! Form::select('banco', array('' => 'Seleccione', 'Banco de Venezuela' => 'Banco de venezuela', 'Banco Mercantil' => 'Banco Mercantil', 'BOD' => 'BOD', 'Banco Mercantil' => 'Banco Mercantil', 'BANESCO' => 'BANESCO', 'BNC' => 'BNC', 'Banco Bicentenario' => 'Banco Bicentenario'), $value = $empleado->info->banco, ['class' => 'form-control requerido', 'id' => 'contrato', 'required']) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group has-feedback">
            {!! Form::label('type_account', 'Cuenta') !!}
            {!! Form::select('cuenta_tipo', array('' => 'Seleccione', 'Ahorro' => 'Ahorro', 'Corriente' => 'Corriente'), $value = $empleado->info->cuenta_tipo, ['class' => 'form-control requerido', 'required']) !!}
        </div>
    </div>
    <div class="col-lg-4 has-feedback">
        <div class="form-group">
            {!! Form::label('account_em', 'Nro. Cuenta', ['class' => 'control-label']) !!}
            {!! Form::text('cuenta_numero', $value = $empleado->info->cuenta_numero, ['class' => 'form-control requerido', 'size' => '4', 'maxlength' => '4', 'placeholder' => 'Ej. 2034 4505 73 1000034682', 'required']) !!}
        </div>
    </div>
@else
    <div class="col-lg-4">
     <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }} has-feedback">
            {!! Form::label('cargo_id', 'Cargo') !!} <small class="text-danger">*</small>
            {!! Form::select('cargo_id', $cargos, null, ['placeholder' => 'Seleccione','class' => 'form-control select', 'required', 'id' => 'cargo', 'onchange' => 'generarCodigo(this.value)']) !!}


                <span class="help-block">
                    <small></small>
                </span>

        </div>


        <div class="form-group{{ $errors->has('contrato') ? ' has-error' : '' }} has-feedback">
            {!! Form::label('contract_status', 'Tipo de contrato') !!} <small class="text-danger">*</small>
            {!! Form::select('contrato', array('' => 'Seleccione', 'Determinado' => 'Determinado', 'Indeterminado' => 'Indeterminado'), null, ['class' => 'form-control select', 'id' => 'contrato', 'required']) !!}


                <span class="help-block">
                    <small></small>
                </span>

        </div>

         <div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }} has-feedback">
            {!! Form::label('code_em', 'Código del empleado') !!}
            {!! Form::text('codigo', null, ['class' => 'form-control requerido', 'required', 'disabled', 'id' => 'codigo']) !!}

            {!! Form::hidden('codigo', null, ['class' => 'form-control requerido', 'id' => 'oculto']) !!}

                <span class="help-block">
                    <small></small>
                </span>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="form-group{{ $errors->has('turno') ? ' has-error' : '' }} has-feedback">
            {!! Form::label('turno_id', 'Turno') !!} <small class="text-danger">*</small>
            {!! Form::select('turno_id', $turnos, null, ['placeholder' => 'Seleccione' ,'class' => 'form-control select', 'required', 'id' => 'turno']) !!}


                <span class="help-block">
                    <small></small>
                </span>

        </div>

        <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }} has-feedback">
            {!! Form::label('duracion', 'Duración') !!}
            {!! Form::text('duracion', null, [ 'class' => 'form-control', 'id' => 'duracion', 'disabled' => 'disabled', 'maxlength' => '3']) !!}


                <span class="help-block">
                    <small></small>
                </span>

        </div>



    </div>

    <div class="col-lg-4">
        <div class="form-group{{ $errors->has('cestaticket') ? ' has-error' : '' }} has-feedback">
            {!! Form::label('cestaticket', 'Cestaticket') !!} <small class="text-danger">*</small>
            {!! Form::select('cestaticket', array('' => 'Seleccione', 'Sí' => 'Si', 'No' => 'No'), null, ['class' => 'form-control select requerido', 'required']) !!}


                <span class="help-block">
                    <small></small>
                </span>

        </div>


      <div class="form-group{{ $errors->has('fecha_de_admision') ? ' has-error' : '' }} has-feedback">
            {!! Form::label('date_of_admission', 'Fecha de ingreso') !!} <small class="text-danger">*</small>
            {!! Form::text('fecha_de_admision', null, ['class' => 'form-control', 'required', 'id' =>'admision']) !!}


                <span class="help-block">
                    <small></small>
                </span>
        </div>
    </div>

    <div class="col-lg-12">
        <h5 class="page-header"><b>DATOS BANCARIOS</b></h5>
    </div>

    <div class="col-lg-4">
        <div class="form-group has-feedback">
            {!! Form::label('bank', 'Banco') !!}

            {!! Form::select('banco', array('' => 'Seleccione', 'Banco de Venezuela' => 'Banco de venezuela', 'Banco Mercantil' => 'Banco Mercantil', 'BOD' => 'BOD', 'Banco Mercantil' => 'Banco Mercantil', 'BANESCO' => 'BANESCO', 'BNC' => 'BNC', 'Banco Bicentenario' => 'Banco Bicentenario', 'Bangente' => 'Bangente'), null, ['class' => 'form-control requerido', 'id' => 'contrato', 'required']) !!}
        </div>
    </div>

    <div class="col-lg-3">
        <div class="form-group has-feedback">
            {!! Form::label('type_account', 'Cuenta', ['class' => 'control-label']) !!}
            {!! Form::select('cuenta_tipo', array('' => 'Seleccione', 'Ahorro' => 'Ahorro', 'Corriente' => 'Corriente'), null, ['class' => 'form-control select', 'required']) !!}
        </div>
    </div>
    <div class="col-md-5">
         {!! Form::label('nro_cuenta', 'N° Cuenta', ['class' => 'control-label']) !!}
        <div class="form-group has-feedback form-inline">
            {!! Form::text('primeros', null, ['class' => 'form-control numerico requerido', 'required', 'size' => '3', 'maxlength' => '4']) !!}
            -
            {!! Form::text('segundos', null, ['class' => 'form-control numerico requerido',  'required', 'size' => '1', 'maxlength' => '2']) !!}
            -
            {!! Form::text('numero', null, ['class' => 'form-control numerico requerido', 'required', 'size' => '19', 'maxlength' => '14', 'id' => 'phone']) !!}
        </div>
    </div>

@endif
