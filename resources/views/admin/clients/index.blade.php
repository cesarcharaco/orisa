@extends('layouts.app')

@section('contenido')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Clientes</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <a href="{{ url('admin/clientes/search') }}">
            <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Nuevo"><span class="fa fa-plus"></span></button>
        </a>

        <a href="{{ route('admin.clientes.listado') }}">
            <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Imprimir"><span class="fa fa-print"></span></button>
        </a>
    </div>
</div>
<br>
<div>
    @include('flash::message')
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <em>Registro de Clientes</em>
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    @include('admin.clients.partials.table')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/verificar.js') }}"></script>
@endsection