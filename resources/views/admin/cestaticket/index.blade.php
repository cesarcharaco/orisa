@extends('layouts.app')

@section('contenido')


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Cestatiket</li>
            <li class="active">Inicio</li>
        </ol>
    </div>
</div>
@if(empty($cestaticket))
    <div class="row">
        <div class="col-lg-4">
            <a href="{{ url('admin/cestaticket/create') }}">
                <button type="button" class="btn btn-primary"><span class="fa fa-plus"></span></button>
            </a>
        </div>
    </div>
@endif
<br>
<div>
    @include('flash::message')
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <em>Cestaticket</em>
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    @include('admin.cestaticket.partials.table')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection