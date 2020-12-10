$(document).ready(function(){

/*
*	Función para empleado
*/

	$("#contrato").on('change', function(e) {

		var contrato = e.target.value;

		if(contrato == 'Determinado'){

			$("#duracion").removeAttr('disabled');

		}else{

			$("#duracion").attr('disabled','disabled');

			return false;
		}
	});
/*
*	Función para reservaciones
*/

$("#hora").on('change', function(e){

	var fecha = $("#fecha").val();
	var hora = e.target.value;
	// var solicitud = fecha+' '+hora;
	if(fecha!= ''){
		$.get("get/" + fecha + '/' + hora + '/tables', function(data){
			
			$('#contenedor').empty();
			$.each(data, function(index, typeObj){
				var image = 'mesa';
				var status = 'Disponible';
				var checkbox = '<input type="checkbox" name="mesas_reservadas[]" value="'+index+'">';
				if(typeObj){
					image = 'mesa-ocupada';
					status = 'Ocupada';
					checkbox = '';
				}

				var render = '<div class="col-md-2 col-sm-6 portfolio-item" id="seleccionado" style="padding: 0 8px 5px 8px;">'+
							'<a href="#" class="portfolio-link seleccionado" data-toggle="modal">'+
							'<div class="portfolio-hover '+ status +'"><div class="portfolio-hover-content">'+
							'<i class="fa fa-plus fa-3x"></i></div></div><img src="../../img/tables/'+image+'.png"'+
							'class="img-responsive" alt=""></a><div class="portfolio-caption">'+
							'<em><p class="text-muted" style="margin: 0; font-size: 13px;"> #'+ index + ' '+ status +'</p><em>'+checkbox+'</div></div>';
				$('#contenedor').append(render);
				
			});

			$(".portfolio-seleccionado").on('click', function(){
				if(!$(this).hasClass('Ocupada')){
				$(this).attr('class', 'portfolio-hover');
			}



			});



		});

	}// if

});// evento change

});// Fin jQuery
