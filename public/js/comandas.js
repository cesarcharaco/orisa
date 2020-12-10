$(document).ready(function(){

	$('#eleccion').on('change', function(e){
		e.preventDefault();
		var eleccion = e.target.value;
		$('#tablero').empty();
		$.get('create/eleccion/' + eleccion, function(data){
			$('#tablero').empty();
			$('#tablero').append('<br>');
			var asset = $('#direccion').val();
			if(data!= ''){
				$.each(data, function(index, typeObj){

					if(typeObj.plato != undefined){
						var img = 'plates/'+typeObj['image'].imagen; //Platos
						var nombre = typeObj.plato;
						var tipo = 1;

					}else if(typeObj.trago != undefined){

						var img = 'beverages/'+typeObj['image'].imagen; //Tragos
						var nombre = typeObj.trago;
						var tipo = 2;

					}else if(typeObj.bebida != undefined){

						var img = 'drinks/cocacola.png'; //Bebidas
						var nombre = typeObj.bebida;
						var tipo = 3;

					}else if(typeObj.jugo != undefined){

						var img = 'juices/'+typeObj['image'].imagen; // Jugos
						var nombre = typeObj.jugo;
						var tipo = 4;

					}else {

					}

					var render = '<a class="agregar"  type="'+typeObj.id+'" data="'+nombre+'" data2="'+typeObj.precio+ '" tipo="'+tipo+'" ><div class="col-md-3"><div class="panel panel-default">'+
								'<div class="panel-body"><img src="'+asset+'/'+img+'" alt="" data-toggle="tooltip" data-placement="top" title="Agregar" class="img-responsive" style="height: 150px"></div><div class="panel-footer">'+
								nombre+''+
								'</div></div></div></a>';
					$('#tablero').append(render);

					$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			});
				});
			}else {
						$('#tablero').empty();
						$('#tablero').html('<h4 class="text-center">No se encontraron resustaldos</h4>');
					}

					// FUNCION AGREGAR
			$('.agregar').on('click', function(){

                var id_i = $(this).attr('type');
                var producto = $(this).attr('data');
                var precio = $(this).attr('data2');
                var tipo = $(this).attr('tipo');
            	var total = $('#total').text();

            	if(total == ''){
            		total = precio;
            	}else{
            		total = parseInt(total) + parseInt(precio);
            	}

     		 	for (var i = 1; i <= 10; i++) {
     		 		var ayuda = '<option>'+i+'</option>';
     		 		var option = option+ayuda;
     		 	}

                var tr = '<tr><td>'+producto+'<input type="hidden" value="'+id_i+'" name="producto[]"></td>'+
                '<td><select class="form-control input-sm" name="cantidades[]">'+
                option+'</select><input type="hidden" value="'+tipo+'" name="tipo[]">'+
                '</td><td class="unitario">'+precio+'</td><td>'+
                '<a class="btn btn-xs remove" data="'+precio+'"><span class="fa fa-trash"></span></a></td></tr>';

            	$('#productos').append(tr);
            	$('#total').text(total);


            	$('.remove').on('click', function(){
            		$(this).parents('tr').first().remove();
            			if($('#productos').is(':empty')){
            				total = 0;
            				}else{
            				var unitario = $(this).attr('data');
            				var total = $('#total').text();

            				var total = parseInt(total) - parseInt(unitario);


                        }
                    $('#total').text(total);
                });
            });
		});
	});


		// Funcion procesar comanda

		// $('.procesar').on('click', function(){
		// 	var comanda = $(this).attr('type');
		// 	var boton = $(this);
		// 	boton.remove();
		// 	$.get('en-espera/procesar/' + comanda, function(data){
		//
		// 	});
		// });


		//Funcion para actualizar las comandas

});// Fin de la funcion jQuery
