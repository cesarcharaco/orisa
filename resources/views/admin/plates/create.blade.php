@extends('layouts.app')

@section('contenido')

<!-- ./row -->
	<div class="row">
    <div class="col-lg-12">
        <h5 class="page-header"></h5>
    </div>
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="{{ url('admin/platos') }}"> Platos</a></li>
            <li class="active">Nuevo</li>
        </ol>
    </div>

    
</div>

<ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class="active" id="1"><a href="#ingredientes" aria-controls="home" role="tab" data-toggle="tab" id="error">Ingredientes</a></li>
    <li role="presentation" id="2"><a href="#licores" aria-controls="profile" role="tab" data-toggle="tab" >Licores</a></li>
    <li role="presentation" id="3"><a href="#plato" aria-controls="messages" role="tab" data-toggle="tab">Publicación de plato</a></li>
  </ul>
    {!! Form::open(['route' => 'admin.platos.store', 'method' => 'POST', 'files' => true, 'id' => 'guardar']) !!}

<div class="tab-content">

   <div role="tabpanel" class="tab-pane active" id="ingredientes">

   		@include('admin.plates.partials.panels-ingredients')
	</div><!-- FIN PILLS INGREDIENTE -->

    <div role="tabpanel" class="tab-pane" id="licores">
   		@include('admin.plates.partials.panels-liqueurs')
    </div><!-- FIN PILLS LICOR -->

    <div role="tabpanel" class="tab-pane" id="plato">
   		@include('admin.plates.partials.panels-plate')
    </div><!-- FIN PILLS PLATO -->

</div>

    {!! Form::close() !!}

@endsection

@section('js')
<script src="{{ asset('js/validaciones.js') }}"></script>
  <script>
    function siguiente(p)
    { 
      var div =  $('#Tagregados').is(':empty');
      
      if(div)
        { 
          $('.mensaje').empty();
          $('.mensaje').append('<div class="alert alert-danger"><strong>Error</strong> agregue los ingredientes del plato</div>')
          $('#ing').attr('data-toggle', '');
          $('#titulo-uno').attr('class', 'text-danger')
          $('#tipos').addClass('has-error');
          $('.help-block').text('Seleccione un tipo');
          $('div.alert').not('.alert-important').delay(5000).fadeOut(350);
        }else
        {
          $('#ing').attr('data-toggle', 'tab');               
          $('#'+p).removeClass('active');
          var tab = parseInt(p) + 1;
          $('#'+tab).addClass('active');
        }
    }

    function anterior(p)
    { 
      $('#'+p).removeClass('active');
      var tab = parseInt(p) - 1;
      $('#'+tab).addClass('active');
    } 

    $('.select-sauces').chosen({
      placeholder_text_multiple: 'Selecione las Salsas',
      no_results_text: 'No se encontraron salsas'
    });
</script>
@endsection