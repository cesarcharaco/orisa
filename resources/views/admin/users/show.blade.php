@extends('layouts.app')

@section('contenido')
	<div class="row"><br>
    <div class="col-lg-8 col-md-12 col-lg-offset-2">
<!--      <h1 class="page-header">Perfil</h1>
 -->        <div class="panel panel-primary">
            <div class="panel-heading">
                Perfil 
                @if(Sentinel::getUser()->roles_id == '1')<span class="label label-primary pull-right">SperSU</span>
                @endif
                @if(Sentinel::getUser()->roles_id == '2')<span class="label label-primary pull-right">Admin</span>
                @endif
            </div>
            <div class="panel-body">
                {{ Form::model($user, array('route' => array('admin.usuarios.update', $user->id), 'method' => 'PUT')) }}
                <div class="col-xs-6 col-md-3 col-lg-2">
    				<a href="#" class="thumbnail">
     		 			<img src="../../img/ingresar.jpg" alt="...">
    				</a>
    				</h1>  
    			</div>
  				<div class="col-md-8 col-lg-9">
  				<h1 class="page-header">{{ Sentinel::getUser()->name }}
                        
                     </div>		
                       <div class="col-lg-1"><br><br><br><a class="editar"><i class="fa fa-pencil pull-right"></i></a></div>		
              <br><br><br><br><br><br>
                	<label>Nombres</label>
                    <div class="form-group input-group">
                       <span class="input-group-addon"><i class="fa fa-user"></i>
                        </span>
                       <input class="form-control input-lg" value="{{ Sentinel::getUser()->first_name }}" name="user" disabled="">
                    </div>
                    <label>Correo</label>
                    <div class="form-group input-group">
                       <span class="input-group-addon"><i class="fa fa-envelope" name="email"></i>
                        </span>
                       <input class="form-control input-lg"
                       value="{{ Sentinel::getUser()->email }}" name="email" disabled="">
                    </div>
                    <label>Contraseña</label>
                    <div class="form-group input-group">
                       <!-- <label>Contraseña</label> -->
						<span class="input-group-addon"><i class="fa fa-lock"></i>
                        </span>                       <input type="password" class="form-control input-lg" name="password" disabled="">
                       
                    </div>
                    <p class="help-block">Deje en blanco si no desea cambiarla</p>
          <center>
					 <button class="btn btn-default btn-sm hide">
					   	<span class="glyphicon glyphicon-floppy-saved fa-2x"></span>
					 </button>
          </center>

            	{!! Form::close() !!}
        	</div>                
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/editar-menu.js')}}"></script>
@endsection