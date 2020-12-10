<br>
<div class="panel panel-default">
	<div class="panel-heading">Licores del plato</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12"><h4>1.- Busque y agregue licores</h4></div>
			</div>
			
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="form-group">
						<label for="tipo">Seleccione el tipo</label>
						{!! Form::select('liqueurs_types', $liqueurs_types, null, ['class' => 'form-control', 'id' => 'types_liqueurs']) !!}
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 col-md-offset-3" id="lista_licores"></div>				
			</div>
			
			<hr>

			<div class="row">
				<div id="" class="col-md-12">
					<h4 class="muted">2.- Coloque las cantidades</h4>
					<table class="table">
						<thead>
							<tr class="active">
								<th>id</th>
								<th>Licor</th>
								<th>Cantidad</th>
								<th>Unidad</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody id="licores_agregados">				
						</tbody>
					</table>
				</div>

				<div class="col-md-6" role="presentation">
					<a class="btn btn-default btn-sm"  href="#ingredientes" aria-controls="profile" role="tab" data-toggle="tab" onclick="anterior(2)">
						<span class="glyphicon glyphicon-circle-arrow-left"></span>
					</a>
				</div>
				<div class="col-md-6 text-right">
					<a class="btn btn-default btn-sm "  href="#plato" aria-controls="profile" role="tab" data-toggle="tab" onclick="siguiente(2)">
						<span class="glyphicon glyphicon-circle-arrow-right"></span>
					</a>
				</div>
				
			</div>

		</div><!-- FIN PANEL BODY -->
</div><!-- FIN PANEL -->
