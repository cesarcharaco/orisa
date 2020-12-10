$('#types').on('change', function(e){
    var type = e.target.value;

    if(type == '')
    {
        $('#ingredients1').empty();
    }

    $.get('create/ingredients/' + type, function(data){

        
        $('#ingredients1').empty();
        $('#ingredients1').append('<table class="table table-hover table-bordered">'+
          '<thead><tr><th>id</th><th>ingrediente</th><th>Acción</th></tr></thead>'+
          '<tbody id="ingredients"></tbody></table>');

        if(data == ''){
            $('#ingredients').append(
                    '<tr><td colspan="3" align="center"> No hay ingredintes de este tipo</td>');

        }else{

            $.each(data, function(index, typeObj){

                $('#ingredients').append(
                    '<tr><td>'+ typeObj.id +'</td>'+
                    '<td>'+ typeObj.ingrediente + '</td>'+
                    '<td align="center"><a class="agregar btn btn-default btn-xs pull-center"'+
                    'type="'+ typeObj.id+'" title="Agregar" data-toggle="tooltip">'+
                    '<span class="fa fa-plus-circle" style="font-size: 16px;"></span></a>'+
                    '</td></tr>'
                 );

            });
        }

            $('.agregar').on('click', function(){

                var id_i = $(this).attr('type');

                $.get('create/addingredient/' + id_i, function(data){

                $('#Tagregados').append(
                    '<tr class="nuevo success" ><td><input type="hidden" name="id_ingredientes[]" value="'+data['ingredient'][0].id +'">'+ data['ingredient'][0].id +
                    '</td><td>' + data['ingredient'][0].ingrediente +
                    '</td><td><div class="inp"><input type="text" name="cantidades_i[]" maxlength="6"  class="cantidad form-control numerico" ></div></td><td>'+
                    '<select class="form-control" name="unidades_i[]"><option value="'+ data['units'][0].id +' ">'+ data['units'][0].unidad +'</option> '+
                    '<option value="'+ data['units'][1].id +' ">'+ data['units'][1].unidad +
                    '</option> '+
                    '<option value="'+ data['units'][2].id +' ">'+ data['units'][2].unidad +
                    '</option> '+
                    '<option value="'+ data['units'][3].id +' ">'+ data['units'][3].unidad +
                    '</option> '+

                    '</td><td align="center"><a class="btn btn-sm btn-danger remove" title="Eliminar">'+
                    '<span class="fa fa-times"></span></a>'
                );

                    // Funcion para remover los igredientes agregados
                    $('.remove').on('click', function(){

                            $(this).parents('tr').first().remove();
                    });

                    $('.numerico').keyup(function(){
                        var valor = $(this).val();

                        if (!/^([0-9])*$/.test(valor)){
                          $(this).val('');
                        }
                    });


            $('.siguiente').on('click',function(){
                var input = $('.cantidad').val();
                if(input == '' || input == null)
                {
                    $('.mensaje').empty();
                    $('#titulo-dos').addClass('text-danger');
                    $('.inp').addClass('has-error');
                    $('.mensaje').append('<div class="alert alert-danger"><strong>Error</strong> coloque las cantidades de cada ingrediente</div>')
                    $('div.alert').not('.alert-important').delay(5000).fadeOut(350);
                    $('#ing').attr('data-toggle', '');
                }
            });

            });//FIN SEGUNDA PETICION AJAX

            // if($('#espacio_boton').is(':empty')){
            //     $('#espacio_boton').append('<center><button class="btn btn-success btn-sm"><span class="fa fa-save fa-2x"></span></button></center>');
            // }



        });

    });//FIN PRIMERA PETICION AJAX

});//FIN DE TODA LA FUNCION JQUERY


//------------------------------------ FUNCION DE AGREGAR LICORES ----------------------------------------//

$('#types_liqueurs').on('change', function(e){
    var type = e.target.value;

    $.get('create/liqueurs/' + type, function(data){

        $('#lista_licores').empty();
        $('#lista_licores').append('<table class="table table-hover table-bordered">'+
          '<thead><tr><th>id</th><th>Licor</th><th>Agregar</th></tr></thead>'+
          '<tbody id="list_liqueurs"></tbody></table>');

        if(data == ''){
            $('#list_liqueurs').append(
            '<tr><td colspan="3" align="center"> No hay licores de este tipo</td>');

        }else{
            $.each(data, function(index, typeObj){

                $('#list_liqueurs').append(
                    '<tr><td>'+ typeObj.id +'</td>'+
                    '<td>'+ typeObj.licor + '</td>'+
                    '<td align="center"><a class="agregar_l btn btn-default btn-xs pull-center"'+
                    'type="'+ typeObj.id+'" title="Agregar">'+
                    '<span class="fa fa-plus-circle" style="font-size: 16px;"></span></a>'+
                    '</td></tr>'
                 );

            });
        }

            $('.agregar_l').on('click', function(){

                var id_l = $(this).attr('type');

                $.get('create/addliqueur/' + id_l, function(data){

                $('#licores_agregados').append(
                    '<tr class="nuevo success" ><td><input type="hidden" name="id_licores[]" value="'+data['liqueur'][0].id+'">'+ data['liqueur'][0].id +
                    '</td><td>' + data['liqueur'][0].licor +
                    '</td><td><input type="number" name="cantidades_l[]" class="form-control" pattern="^[9|8|7|6]\d{8}$"></td><td>'+
                    '<select name="unidades_l[]" class="form-control"><option value="'+ data['units'][0].id +' ">'+ data['units'][0].unidad +'</option> '+
                    '<option value="'+ data['units'][1].id +' ">'+ data['units'][1].unidad +
                    '</option> '+
                    '<option value="'+ data['units'][2].id +' ">'+ data['units'][2].unidad +
                    '</option> '+
                    '<option value="'+ data['units'][3].id +' ">'+ data['units'][3].unidad +
                    '</option> '+
                    '</td><td align="center"><a class="btn btn-sm btn-danger remove_l" title="Eliminar">'+
                    '<span class="fa fa-times"></span></a>'
                );

                    // Funcion para remover los igredientes agregados
                    $('.remove_l').on('click', function(){

                            $(this).parents('tr').first().remove();
                    });

            });//FIN SEGUNDA PETICION AJAX


        });

    });//FIN PRIMERA PETICION AJAX

});//FIN DE TODA LA FUNCION JQUERY



//--- VALIDACIONES

$('#guardar').submit(function(e){
    var posicion = $('#ingredientes');
    if ($('#Tagregados').is(':empty')){
        $('#error').append(' <span class="label label-danger"> 1</span>');
    return false;
}
});


$('#form_salsa').submit(function(){

    //LIMPIO ESTILOS
    $('#salsa_label').attr('class', '');
    $('#titulo_ingredientes').attr('class', '');
    $('#tipo_label').attr('class', '');

    //Si salas vacio
    if ($('#salsa').val() == '') {
        $('.hidden').attr('class', 'show');
        $('#salsa_label').attr('class', 'text-danger');

        if ($('#Tagregados').is(':empty')){
            $('#tipo_label').attr('class', 'text-danger');
            $('#titulo_ingredientes').attr('class', 'text-danger');
        }

        return false;
    }

    if ($('#Tagregados').is(':empty')) {
            $('.hidden').attr('class', 'show');
            $('#tipo_label').attr('class', 'text-danger');
            $('#titulo_ingredientes').attr('class', 'text-danger');

        return false;
    }
});

function desbloquear()
{
    var laboran = document.getElementsByClassName("laboran");
    var hora_entrada = document.getElementsByClassName("entradasL");
    var hora_salida = document.getElementsByClassName("salidasL");

     
    for (i = 0; i < laboran.length; i++)
    {
        if (laboran[i].value == 'Asistio')
        {
            hora_entrada[i].disabled = false;
            hora_salida[i].disabled = false;

        }else{
                
            hora_entrada[i].disabled = true;
            hora_salida[i].disabled = true;
        }
    }
}

function desbloquear2()
{
    var nolaboran = document.getElementsByClassName("noLaborados");
    var hora_entrada = document.getElementsByClassName("entradasNL");
    var hora_salida = document.getElementsByClassName("salidasNL");

     
    for (i = 0; i < nolaboran.length; i++)
    {
        if (nolaboran[i].value == 'Asistio')
        {
            hora_entrada[i].disabled = false;
            hora_salida[i].disabled = false;

        }else{
                
            hora_entrada[i].disabled = true;
            hora_salida[i].disabled = true;
        }
    }
}

$("#modo").change(function () 
{

    var id = $("#modo").val();

    if(id == 0)
    {
        $('#valor').attr({
            disabled: true,
            title: "",
            placeholder: ""
        });

    } else {

        if (id == 'P')
        {
            $('#valor').attr({
                disabled: false,
                title: "Introduzca el porcentaje de la asignación o deducción",
                placeholder: "Ejm: 5",
                min: "1",
                max: "100"
            });

        } else {

            if (id == 'D')
            {
                $('#valor').attr({
                    disabled: false,
                    title: "Introduzca el porcentaje de la asignación o deducción",
                    placeholder: "Ejm: 5",
                    min: "1",
                    max: "100"
                });
            } else {

                $('#valor').attr({
                    disabled: false,
                    title: "Introduzca el valor de la asignación o deducción",
                    placeholder: "Ejm: 500 Bsf",
                    min: "1"
                });
            }
        }
    }     
});

        function desbloquearAss() 
        {
            var val = document.getElementById("motivo").value;

            if (val == 'Asistio') 
            {

                $('#hora_entrada').attr({ 
                    disabled: false,
                    value: '',
                    required: true
                });

                $('#hora_salida').attr({ 
                    disabled: false,
                    value: '',
                    required: true
                });

            } else {

                $('#hora_entrada').attr({ 
                    disabled: true,
                    required: false,
                    title: '',
                    value: '00:00'
                });

                $('#hora_salida').attr({ 
                    disabled: true,
                    required: false,
                    title: '',
                    value: '00:00'
                });
            }

        }

        $(document).ready(function()
        {
            $("#optionsRadiosInline1").click(function () {

                var razon = $('#optionsRadiosInline1').val();

                if (razon == 'S')
                {
                   $('#razon').attr({ 
                        disabled: false,
                        required: true
                    }); 
                }
            });
     
            $("#optionsRadiosInline2").click(function () {     
                
                var razon = $('#optionsRadiosInline2').val();

                if (razon == 'N')
                {
                   $('#razon').attr({ 
                        disabled: true,
                        title: '',
                        placeholder: ''
                    }); 
                }

            });
            
         });
