$(document).ready(function(){

var label = $('.estatus').text();

	function ActualizarComandas(){
		$.get('en-espera/actualizar', function(data){

				$.each(data, function(index, typeObj){

					$('.estatus'+typeObj.id).empty();
					$('.estatus'+typeObj.id).text(typeObj.estatus);
					if(typeObj.estatus == 'Lista'){
						$('.estatus'+typeObj.id).removeClass('label-warning');
						$('.estatus'+typeObj.id).addClass('label-primary');
						$('#contenedor'+typeObj.id).empty();
						$('#contenedor'+typeObj.id).append('<button class="btn btn-default btn-xs" data-toggle="tooltip" title="Facturar"><span class="glyphicon glyphicon-credit-card fa-2x"></span></button>')

					}
				});

				$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		});

		});
	}

	setInterval(ActualizarComandas, 2000);


});
