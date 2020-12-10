@extends('layouts.web')

@section('content')
  <!-- Portfolio Grid Section -->
  <section id="portfolio" class="bg-light-gray" style="padding: 100px 0 50px 0;">
      <div class="container">
          <!--<div class="row">
              <div class="col-lg-6 text-center">
                  <h2 class="section-heading">Area de cliente</h2>
                  <h3 class="section-subheading text-muted">.</h3>
              </div>
          </div>-->
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="row">
                <div class="col-lg-6 text-center">
                    <h3 class="section-heading">Reservaciones</h3>
                    <h3 class="section-subheading text-muted">.</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-danger" style="padding: 25px 45px;" role="alert">Aún no ha hecho ninguna reservación</div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <a href="{{ url('/client/reservations/create') }}" class="btn btn-primary" style="padding: 20px 40px;">Hacer reservación</a>
                </div>
              </div>
            </div>
        </div> 
          <div class="row">
            <!-- Platos del dia -->
            <div class="col-md-12 col-sm-12">
            <div class="row">
              <div class="col-lg-6 text-center">
                  <h3 class="section-heading">Menu del día</h3>
                  <h3 class="section-subheading text-muted">.</h3>
              </div>
            </div>
              @if(!empty($platos))
                @foreach($platos as $plato)
                  <div class="col-md-3 col-sm-6 portfolio-item">
                      <a href="#portfolioModal{{$plato->id}}" class="portfolio-link" data-toggle="modal">
                          <div class="portfolio-hover">
                              <div class="portfolio-hover-content">
                              </div>
                          </div>
                          <img src="{{ asset('img/plates')}}/{{ $plato->image->imagen }}" class="img-responsive" alt="" style="height: 150px;">
                      </a>
                      <div class="portfolio-caption" style="padding: 10px 20px;">
                          <h4>{{ $plato->plato }}</h4>
                          <p class="text-muted">Graphic Design</p>
                      </div>
                  </div>
                  @endforeach
              @else
              <div class="col-md-12 text-center">
                   <h3 class="section-subheading text-muted">NO HAY MENU DISPONIBLE DEL DÍA</h3>
        </div>
            @endif          
        </div>
      </div>
      <!-- Fin Platos del dia -->

           
  </section>
@endsection

