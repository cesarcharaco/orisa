@extends('layouts.web')

@section('content')
<section class="bg-light-gray" style="padding: 100px 0 50px 0;" id="reservations">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Panel de reservaciones</h2>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            @include('flash::message')
          </div>
        </div>
        {!! Form::open(['route' => 'reservaciones.store', 'method' => 'POST', 'name' => 'sentMessage', 'novalidate']) !!}
         <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                    <label>Fecha</label>
                        <input type="text" class="form-control" placeholder="" id="datepicker" required data-validation-required-message="Please enter your name." data-toggle="tooltip" data-placement="top" title="Fecha de la reservación" name="fecha_reservacion">
                        <p class="help-block">Seleccione la Fecha</p>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <label>Hora</label>
                        <select class="form-control" id="hora" data-toggle="tooltip" data-placement="top" title="Hora de la reservación" name="hora_reservacion">
                            <option value="9:00:00">9:00 am</option>
                            <option value="10:00:00">10:00 am</option>
                            <option value="11:00:00">11:00 am</option>
                            <option value="12:00:00">12:00 am</option>
                            <option value="13:00:00">1:00 pm</option>
                            <option value="14:00:00">2:00 pm</option>
                            <option value="15:00:00">4:00 pm</option>
                            <option value="16:00:00">5:00 pm</option>
                            <option value="17:00:00">6:00 pm</option>
                            <option value="18:00:00">7:00 pm</option>
                            <option value="19:00:00">8:00 pm</option>
                            <option value="20:00:00">9:00 pm</option>
                        </select>
                        <p class="help-block">Seleccione la hora</p>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                    <label>Alguna especificación</label>
                        <textarea class="form-control" data-toggle="tooltip" data-placement="top" title="Algo en que podamos ayudarlo (Ej: dos mesas juntas)" name="especificacion"></textarea>
                    </div>

                        <button type="submit" class="btn btn-primary btn-xl" data-toggle="tooltip" data-placement="top" title="Realizar reservación" style="padding: 10px 20px;">
                            Reservar
                        </button>
                    </div>
				<div class="col-md-8">
                	<div class="row" id="contenedor"></div>
				</div>
        </div>
        {!! Form::close() !!}
	</div>
</section>
@endsection