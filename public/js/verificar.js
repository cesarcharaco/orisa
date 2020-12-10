function verificar(id)
{	
	$('#confirmar').on('click', function(e){
		e.preventDefault();
		var clave = $('#clave').val();

		if(clave == '' || clave == null || clave.length == 0)
		{
			mensaje(2000, 'Por favor ingrese su contraseña');
		}

		$.get('verificar/'+ clave, function(data){

			if (data) 
			{
				$('#verificar').modal('hide');
				$('#eliminar').modal();
				$('#eliminar_id').val(id);
			}else
			{
				mensaje(2500, 'Contraseña incorrecta');
				$('#clave').val('');
			}

		});

	});
}

function mensaje(t, msj)
{	
	$('#msj').empty();
	$('#msj').append('<div class="alert alert-danger">'+ msj +'</div>');
	setTimeout(function() { $('.alert').fadeOut(350); }, t);
}

