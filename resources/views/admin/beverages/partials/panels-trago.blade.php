<br>
	<div class="panel panel-default">
		<div class="panel-heading">Datos iniciales</div>
			<div class="panel-body">


				<div class="col-xs-6 col-md-3">
    				<a href="#" class="thumbnail">
     		 			<img src="../../img/ingresar.jpg" alt="..." id="img_prev">
    				</a>
  				</div>

				<div class="form-group">

					{!! Form::label('image', 'Imagen de la bebida') !!}

					<input type="file" name="image" onchange="readURL(this)" id="file">
					
					<span class="help-block">El formato permitido es PNG o JPG no mayor de 20KB</span>
				</div>
					<br><br><br><br><br>
		<div class="row">
			<div class="col-md-6 col-lg-4">
				<div class="form-group has-feedback">
					{!! Form::label('bebida', 'Nombre de la bebida') !!}

					{!! Form::text('trago', null, ['class' => 'form-control requerido', 'placeholder' => 'Ejemplo: Mojito', 'title' => 'Ingrese su nombre', 'required']) !!}

					<span class="help-block"></span>
				</div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="form-group has-feedback">
					{!! Form::label('precio', 'Precio') !!}

					<div class="input-group">

						{!! Form::text('precio', null, ['class' => 'form-control numerico', 'placeholder' => '3200', 'title' => 'Ingrese su nombre', 'required']) !!}

						<span class="input-group-addon">Bs.</span>
					</div>
					<span class="help-block"></span>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group has-feedback">
					{!! Form::label('descripcion', 'Descipción') !!}

					{!! Form::textarea('descripcion', null, ['class' => 'form-control requerido', 'required']) !!}
					
					<span class="help-block"></span>
				</div>
			</div>
		</div>

<div class="row">
	<div class="form-group tooltip-demo text-center">
		<button class="btn btn-default btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Guardar"><span class="glyphicon glyphicon-floppy-saved fa-2x"></span></button>
		<button class="btn btn-default btn-sm" type="reset" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Borrar"><span class="glyphicon glyphicon-floppy-remove fa-2x"></span></button>
	    <br>
	</div>

	<br>
	<div class="col-md-12"><br>
					<a class="btn btn-default btn-sm"  href="#ingredientes" aria-controls="profile" role="tab" data-toggle="tab" onclick="anterior(3)">
						<span class="glyphicon glyphicon-circle-arrow-left"></span>
					</a>
				</div>
</div>

	</div>
</div>
