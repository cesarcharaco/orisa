@extends('layouts.app')

@section('contenido')


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="{{ url('admin/asistencias') }}">Asistencias</a></li>
            <li class="active">Editar</li>
        </ol>
    </div>
</div>
<br>
<div>
    @include('flash::message')
</div>
{{ Form::model($asistencia, ['route' => ['admin.asistencias.update', $asistencia->id], 'method' => 'PUT']) }}
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <em>Editar asistencia con fecha </em>{{ $asistencia->attendays->fecha }}
                </div>
                <div class="panel-body">
                    @include('admin.asistencias.partials.fields-edit')
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}

@endsection

@section('js')

<script>
$(document).ready(function() 
{
    var val = document.getElementById("motivo").value;

    if (val == 'Asistio') 
    {
        $('#hora_entrada').attr({ 
            disabled: false
        });

        $('#hora_salida').attr({ 
            disabled: false
        });

    } else {

        $('#hora_entrada').attr({ 
            value: ''
        });

        $('#hora_salida').attr({ 
            value: ''
        });

    }

});
</script>
@endsection