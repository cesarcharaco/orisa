<br>
<div class="panel panel-default">
	<div class="panel-heading">Ingredientes del plato</div>
		<div class="panel-body">
			<div class="row">
			<div class="col-md-12 mensaje"></div>
				<div class="col-md-12"><p id="titulo-uno">1.- Busque y agregue ingredientes</p></div>
			</div>
			
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="form-group" id="tipos">
						<label for="tipo" class="control-label">Tipo de ingredientes</label>
						<select class="form-control" id="types" name="ingredients_types">
						<option value="">Seleccione..</option>
						@foreach($ingredients_types as $type)
							<option value="{{ $type->id }}">{{ $type->tipo_ingrediente }}</option>
						@endforeach
						</select>
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6 col-md-offset-3" id="ingredients1"></div>				
			</div>
			
			<hr>

			<div class="row">
				<div id="agregados" class="col-md-12">
					<p id="titulo-dos">2.- Coloque las cantidades</p>
					<table class="table">
						<thead>
							<tr class="active">
								<th>id</th>
								<th>Ingrediente</th>
								<th>Cantidad</th>
								<th>Unidad</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody id="Tagregados"></tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h4 class="muted">3.- Selecciones La o las Salsas</h4>	
					{!! Form::select('sauces[]', $sauces, null, ['class' => 'form-control select-sauces form-control', 'multiple']) !!}
				</div>
			
				<div class="col-md-12 text-right"><br>
					<a class="btn btn-default btn-sm siguiente"  href="#licores" aria-controls="profile" data-toggle="tab" onclick="siguiente(1)" id="ing">
						<span class="glyphicon glyphicon-circle-arrow-right"></span>
					</a>
				</div>
					
			</div>
			
		</div><!-- FIN PANEL BODY -->
</div><!-- FIN PANEL -->
