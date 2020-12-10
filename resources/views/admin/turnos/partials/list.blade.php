<div class="col-lg-4">
<div class="form-group">
	<div class="input-group">
		<div class="form-group">
				<select class="form-control" name="id" required="required">
					<option value=""> SELECCIONE </option>
					@foreach($planificaciones as $planificacion)
						<option value="{{ $planificacion->id }}"> {{ $planificacion->full_dates }}</option>
					@endforeach
				</select>
		</div>
     	<span class="input-group-btn">
        	<button type="submit" class="btn btn-default" type="button" id="buscar" title="Buscar productos">
          		<span class="glyphicon glyphicon-search"></span>
          	</button>
        </span>
 	</div>
</div>
</div>
