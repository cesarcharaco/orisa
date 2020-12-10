    <div class="col-md-12">
        <div class="page-header">
            <h4> {{ $user->first_name }}</h4>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
            {!! Form::label('nombre', 'Nombre(s)') !!}
            {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Ejm: Jesús Eduardo', 'title' => 'Ingrese su usuario']) !!}

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
            {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Ejm: Matute Rangel', 'title' => 'Ingrese su usuario']) !!}

            @if ($errors->has('user'))
                <span class="help-block">
                    <strong>{{ $errors->first('user') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
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
        <div class="form-group">
            {!! Form::label('roles_id', 'Tipo de usuario') !!}
            {!! Form::select('roles_id', array('2' => 'Administrador(a)', '3' => 'Encargado(a)', '4' => 'Cocinero(a)', '5' => 'Cajero(a)', '6' => 'Mesonero(a)'), null, ['class' => 'form-control']) !!}
        </div><br>
    </div>
