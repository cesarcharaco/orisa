<div class="col-md-12">
    <div class="page-header">
        <h4> {{ $empleado->full_name }}</h4>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
        {!! Form::label('nombre', 'Nombre(s)') !!}
        {!! Form::text('first_name', $empleado->nombres, ['class' => 'form-control', 'placeholder' => '', 'title' => '', 'disabled']) !!}

        @if ($errors->has('user'))
            <span class="help-block">
                    <strong>{{ $errors->first('user') }}</strong>
                </span>
        @endif
    </div>
</div>
<div class="col-md-6">
    <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
        {!! Form::label('apellido', 'Apellido(s)') !!}
        {!! Form::text('last_name', $empleado->apellidos, ['class' => 'form-control', 'placeholder' => '', 'title' => '', 'disabled']) !!}

        @if ($errors->has('user'))
            <span class="help-block">
                    <strong>{{ $errors->first('user') }}</strong>
                </span>
        @endif
    </div>
</div>
<div class="col-md-6">
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        {!! Form::label('contraseña', 'Contraseña') !!}
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ejm: 123456']) !!}

        @if ($errors->has('password'))
            <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label('email', 'Correo Electrónico') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com']) !!}

    @if ($errors->has('email'))
            <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
        @endif
    </div>
</div>
<div class="col-md-6">
    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        {!! Form::label('contraseña', 'Confirmar contraseña') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Ejm: 123456']) !!}

        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('roles_id', 'Tipo de usuario') !!}
        {!! Form::select('roles_id', array('2' => 'Administrador(a)', '3' => 'Encargado(a)', '4' => 'Cocinero(a)', '5' => 'Cajero(a)', '6' => 'Mesonero(a)'), null, ['class' => 'form-control']) !!}
        {!! Form::hidden('id', $empleado->id) !!}
    </div>
</div>