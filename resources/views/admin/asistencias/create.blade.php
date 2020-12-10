@extends('layouts.app')

@section('contenido')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="{{ url('admin/asistencias') }}">Asistencias</a></li>
            <li class="active">Nuevo</li>
        </ol>
    </div>
</div>
<div>
    @include('flash::message')
</div>
{!! Form::open(['route' => 'admin.asistencias.store', 'method' => 'POST', 'name' => 'form1']) !!}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <em> Registro de asistencia </em>
                </div>
                <div class="panel-body">
                    @include('admin.asistencias.partials.fields')
                <br>
                @if(count($empleadosNoLaboran) > 0 OR count($empleadosLaboran) > 0)
                    <div class="form-group tooltip-demo text-center">
                        <button class="btn btn-default btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Guardar"><span class="glyphicon glyphicon-floppy-saved fa-2x"></span></button>
                        <button class="btn btn-default btn-sm" type="reset" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Cancelar"><span class="glyphicon glyphicon-floppy-remove fa-2x"></span></button>
                        <br>
                    </div> 
                @endif
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}

@endsection