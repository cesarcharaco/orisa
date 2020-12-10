@extends('layouts.app')

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="{{ url('admin/empleados') }}">Empleados</a></li>
            <li class="active">Nuevo</li>
        </ol>
    </div>
</div>
<br>
<div>
    @include('flash::message')
</div>
{!! Form::open(['route' => 'admin.empleados.store', 'method' => 'POST']) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <em>Registro de Empleado</em>
                </div>
                <div class="panel-body">
                    @include('admin.empleados.partials.fields')
                </div>
                
                <div class="col-lg-12">
                    <br>
                        <div class="form-group tooltip-demo text-center">
                            <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Guardar"><span class="glyphicon glyphicon-floppy-saved fa-2x"></span></a>
                            <button class="btn btn-default btn-sm" type="reset" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Borrar"><span class="glyphicon glyphicon-floppy-remove fa-2x"></span></button>
                        </div>
                    <br> 
                </div>


            </div>
        </div>
    </div>
{!! Form::close() !!}

<div class="row">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">CREAR UN USUARIO</h4>
                </div>
                <div class="modal-body">
                    ¿Desea creale un usuario a este empleado...?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default pull-left" name="user" value="0">No</button>
                    <button type="submit" class="btn btn-primary" name="user" value="1">Si</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="{{ asset('js/funciones.js') }}"></script>
    <script src="{{ asset('js/validaciones.js') }}"></script>

    <script type="text/javascript">
    function generarCodigo(id)
    {   
        if(id == null || id == '')
        {
            $('#codigo').val('');
        
        }else
        {
            $.get('cargo/'+ id, function(data) {
                $('#codigo').val(data);
                $('#oculto').val(data);
            });
        }
    }
    </script>

    <script src="{{ asset('jquery/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
    <script>
        $( function() {
        $( "#datepicker" ).datepicker({
            monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembere" ],
            dayNamesMin: [ "Do", "Lu", "Ma", "Mie", "Jue", "Vie", "Sab" ],
            dateFormat: 'dd-mm-yy',
            changeMonth: true, 
            changeYear: true,
            maxDate: new Date(1999, 1 - 1, 1),
            minDate: new Date(1970, 1 -1, 1),
            yearRange: '-100:+0'
          });
        });

        $(function(){
            $('#admision').datepicker({
                monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
                monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembere" ],
                dayNamesMin: [ "Do", "Lu", "Ma", "Mie", "Jue", "Vie", "Sab" ],
                dateFormat: 'dd-mm-yy',
                changeMonth: true, 
                changeYear: true,
                minDate: new Date(2010, 1 -1, 1),
                maxDate: '0',
                yearRange: '-100:+0'
            })
        });
        // $( "#datepicker" ).datepicker({
        //
        // });
    </script>

@endsection
