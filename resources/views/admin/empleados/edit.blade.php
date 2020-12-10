@extends('layouts.app')

@section('contenido')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="{{ url('admin/empleados') }}">Empleados</a></li>
            <li class="active">Editar</li>
        </ol>
    </div>
</div>
<br>
<div>
    @include('flash::message')
</div>
{{ Form::model($empleado, ['route' => ['admin.empleados.update', $empleado->id], 'method' => 'PUT']) }}
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <em>Editar: {{ $empleado->full_name }}</em>
                </div>
                <div class="panel-body">
                    @include('admin.empleados.partials.fields')
                </div>
                <div class="col-lg-12">
                    <br>
                        <div class="form-group tooltip-demo text-center">
                            <button class="btn btn-default btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Guardar"><span class="glyphicon glyphicon-floppy-saved fa-2x"></span></button>
                            <button class="btn btn-default btn-sm" type="reset" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Borrar"><span class="glyphicon glyphicon-floppy-remove fa-2x"></span></button>
                        </div>
                    <br> 
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}

@endsection
