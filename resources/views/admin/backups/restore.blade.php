@extends('layouts.app')

@section('contenido')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">Restauranción</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-primary" data-toggle="modal" data-target="#verificar"><span class="fa fa-plus"></span></a>
            <input type="file" id="input" style="display: none;">
            <div class="cargando"></div>
        </div>
    </div>
    <br>
    <div>
        @include('flash::message')
    </div>
    <!--<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <em>Historial de respaldos</em>
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                    </div>
                </div>
            </div>
        </div>
    </div>
-->
    <!-- INICIO MODAL -->
    <div class="modal fade" id="verificar" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" class="title">Ingrese su contraseña</h4>
                </div>
                <div class="modal-body" >
                    <div class="form-group">
                       <input type="password" name="password"  class="form-control" id="clave" maxlength="16">
                    </div>
                    <div id="msj"></div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    
                    <a class="btn btn-primary" id="confirmar">Confirmar</a>
                </div>
            </div>
        </div>            
    </div>
    <!--  FIN MODAL -->
@endsection
@section('js')
<script>   
    $('#confirmar').on('click', function(){
        let img = '<img src="{{ asset('img/cargando.gif') }}" />';
        $('.cargando').append(img);
        mensaje(1500, 'Contraseña correcta');
        $('#input').trigger("click");
        console.log(img)
        setTimeout(function() { 
            $('#verificar').modal('toggle');

        }, 1500);
    });

    function mensaje(t, msj)
    {   
        $('#msj').empty();
        $('#msj').append('<div class="alert alert-success">'+ msj +'</div>');
        setTimeout(function() { $('.alert').fadeOut(350); }, t);
    }
</script>

@endsection