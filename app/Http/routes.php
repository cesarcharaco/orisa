<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
	/*
	|	RUTAS DE INICIO
	|
	*/

	Route::group(['prefix' => '/', 'middleware' => 'guest'], function() {


		// ROUT::GET

		Route::get('/', 'AuthenticateController@index');
		Route::get('iniciarsesion', 'AuthenticateController@getLogin');
		Route::get('registrarme', 'RegisterController@register');
		Route::get('activarcuenta/{email}/{code}/', 'ActivationController@activate');
		Route::get('recuperarclave', 'ForgotPasswordController@forgotPassword');

		// ROUTE::POST

		Route::post('registrarme', 'RegisterController@postRegister');
		Route::post('iniciarsesion', 'AuthenticateController@postLogin');
		Route::post('recuperarclave', 'ForgotPasswordController@postForgotPassword');

	});

	Route::group(['prefix' => '/client', 'middleware' => 'auth'], function() 
	{
		Route::get('/', 'AuthenticateController@index');
		Route::get('/area', 'WebController@index');
		Route::get('/reservations/create', 'WebController@createReservations');
		Route::get('/reservations/get/{fecha}/{hora}/tables', 'ReservationsController@getTables');
		Route::get('/exit/{id}/', 'AuthenticateController@clientLogout');
 	});

	Route::group(['middleware' => 'auth'], function () {

		Route::post('salir', 'AuthenticateController@logout');

	});

	Route::get('/search/{cedula}', 'ClientsController@getClient');
	Route::resource('reservaciones', 'ReservationsController');
	Route::get('reservaciones/{id}/destroy', [
		'uses' => 'ReservationsController@destroy',
		'as' => 'reservaciones.destroy'
	]);

	Route::get('/solicitud-reservacion/{fecha}/{hora}', 'ReservationsController@getTables');
	Route::resource('usuario-vip', 'TemporalController');

	Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

 	Route::resource('/', 'HomeController@index');
	Route::resource('privilegios', 'PrivilegesController');
	Route::resource('usuarios', 'UsersController');
	Route::get('usuarios/{id}/destroy', [
		'uses' => 'UsersController@destroy',
		'as' => 'admin.usuarios.destroy'
		]);
	Route::get('bitacora', [
		'uses' => 'BitacoraController@index',
		'as' => 'admin.bitacora'
	]);

	/*
	|
	|	Rutas Jesús Matute
	|
	*/
 	Route::get('salir', 'Auth\AuthController@logout');
 	Route::get('empleados/buscar', ['uses' =>'EmployeesController@search','as'   => 'admin.empleados.search']);
 	Route::get('imprimir-empleado/{id}', [
		'uses' => 'EmployeesController@print', 
		'as' => 'admin.empleados.imprimir'
		]);
 	Route::get('listado-empleados', [ 'uses' => 'EmployeesController@printList', 'as' => 'admin.empleados.listado']);
 	Route::resource('empleados', 'EmployeesController');
 	Route::get('empleados/cargo/{id}', 'EmployeesController@getCargo');
	Route::resource('cargos', 'PositionsController');

	Route::get('planificaciones/{id}/administrar', ['uses' => 'PlanningsController@administrar','as'   => 'admin.planificaciones.administrar']);
	Route::get('asistencias/buscar', ['uses' =>'AssistsController@search','as'   => 'admin.asistencias.search']);
	Route::get('asistencias/{id}/destroy', ['uses' => 'AssistsController@destroy', 'as' => 'admin.asistencia.destroy']);
	Route::post('nomina/crear', ['uses' => 'PayrollSavedController@create', 'as' => 'admin.nomina.guardar']);
	Route::get('nominas/guardadas', ['uses' => 'PayrollSavedController@index', 'as' => 'admin.nomina.inicio']);
	Route::get('nominas/guardadas/{id}', ['uses' => 'PayrollSavedController@pdfNomina', 'as' => 'admin.nomina.pdfI']);
	Route::get('nominas/mostrar/{id}', ['uses' => 'PayrollSavedController@show', 'as' => 'admin.nomina.mostrar']);
	/*
	|
	|	Rutas resource controladores de nómina
	|
	*/
	Route::resource('asistencias', 'AssistsController');
	Route::resource('deducciones', 'DeductionsController');
	Route::resource('adicionales', 'AdditionalsController');
	Route::resource('cestaticket', 'CestaticketsController');

	Route::resource('temporary_assigments', 'TemporaryAssignmentsController');
	Route::resource('asignaciones', 'AssignmentsController');
	Route::resource('asignaciones_extras', 'AssignmentsExtrasController');

	Route::resource('temporary_deductions', 'TemporaryDeductionsController');
	Route::resource('deducciones_extras', 'DeductionsExtrasController');
	Route::get('nomina/ver', ['uses' => 'PayrollController@view', 'as' => 'admin.payroll.view']);
	Route::post('nomina/mostrar', ['uses' => 'PayrollController@show2', 'as' => 'admin.payroll.show']);
	Route::get('nomina/select', ['uses' => 'PayrollController@select', 'as' => 'admin.payroll.select']);
	Route::get('nomina/pdf/{id}', ['uses' => 'PayrollController@pdf', 'as' => 'admin.recibo.nomina']);

	Route::resource('nomina', 'PayrollController');
	/*
	|
	|	Rutas resource controladores de planificación
	|
	*/
	Route::get('planificaciones/{id}/destroy', ['uses' => 'PlanningsController@destroy','as' => 'admin.planificacion.destroy']);

	Route::resource('planificaciones', 'PlanningsController');
	Route::get('planificaciones/administrar/dias/turnos/seleccionar-planificacion', 'TurnsController@select');
	Route::get('planificaciones/administrar/dias/turnos/ver-planificacion', [
		'uses' => 'TurnsController@view',
		'as'   => 'admin.planificaciones.administrar.dias.turnos.view'
		]);
	Route::resource('planificaciones/administrar/dias/turnos', 'TurnsController');
	Route::resource('planificaciones/administrar/dias', 'Planning_DaysController');
	/*
	|
	|	RUTAS OLIVER
	|
	*/
	Route::get('proveedores/search', ['uses' => 'ProvidersController@search', 'as' => 'admin.proveedores.search']);
	Route::get('imprimir-proveedor/{id}', [
		'uses' => 'ProvidersController@print', 
		'as' => 'admin.proveedores.imprimir'
		]);

	Route::resource('proveedores', 'ProvidersController');
	Route::get('listado-proveedores', ['uses' => 'ProvidersController@printList', 	
		'as' => 'admin.proveedores.listado']);
	Route::get('compra/ordenes', [
		'uses' => 'PurchasesController@order',
		'as' => 'admin.compra.ordenes'
		]);
	Route::post('compra/save', ['uses' => 'PurchasesController@saved','as' => 'admin.compra.save']);
	Route::get('compra/{id}/procesar', ['uses' => 'PurchasesController@process','as' => 'admin.compra.procesar']);
	Route::resource('compra', 'PurchasesController');

	Route::get('compra/pdf/{id}', ['uses' => 'PurchasesController@pdf', 'as' => 'admin.compra.pdf']);
	Route::get('listado-compra', [ 'uses' => 'PurchasesController@printList', 'as' => 'admin.compra.listado']);


	Route::resource('licores', 'LiqueursController');
	Route::resource('ingredientes', 'IngredientsController');
	Route::resource('bebidas', 'DrinksController');
	/*
	|
	|	RUTAS SAUL
	|
	*/
	Route::get('backup/download/{file_name}', ['uses' => 'BackupController@download', 'as' => 'backup.download']);
	Route::get('backup/restore/{file_name}', ['uses' => 'BackupController@restore', 'as' => 'backup.restore']);
	Route::get('restore', ['uses' => 'BackupController@restoreFalse', 'as' => 'restore.false']);
	Route::delete('backup/destroy/{file_name}', ['uses' => 'BackupController@destroy', 'as' => 'backup.destroy']);
	Route::get('clientes/search', ['uses' => 'ClientsController@search', 'as' => 'admin.clientes.buscar']);

	Route::resource('clientes', 'ClientsController');
	Route::get('imprimir-cliente/{id}', [
		'uses' => 'ClientsController@print', 
		'as' => 'admin.clientes.imprimir'
		]);
	Route::get('listado-clientes', [ 'uses' => 'ClientsController@printList', 'as' => 'admin.clientes.listado']);
	Route::resource('platos', 'PlatesController');
	Route::resource('sauces', 'SaucesController');
	Route::resource('tragos', 'BeveragesController');
	Route::resource('jugos', 'JuicesController');
    Route::resource('backup', 'BackupController');
    Route::resource('categorias', 'CategoryController');
	Route::resource('reservaciones', 'ReservationsController');
	Route::get('comandas/en-espera', ['uses' => 'CommandsController@hold', 'as' => 'admin.comandas.en-espera']);
	Route::get('comandas/facturar', ['uses' => 'CommandsController@invoice', 'as' => 'admin.comandas.facturar']);
	Route::get('comandas/procesadas', ['uses' => 'CommandsController@process', 'as' => 'admin.comandas.procesadas']);
	Route::get('comandas/cliente-nuevo', ['uses' => 'CommandsController@client_new', 'as' => 'admin.comandas.cliente-nuevo']);
	Route::get('recibos/movimiento', ['uses' => 'InvoicesController@movimiento', 'as'   => 'admin.recibos.movimiento']);
	// Route::get('comandas/en-espera/procesar/{comanda}', function($comanda){
	// 	$command = App\Command::find($comanda);
	// 	$command->estatus = 'Lista';
	// 	$command->save();
	//
	// 	return Response::json($command);
	// });
	Route::get('comandas/en-espera/actualizar', 'CommandsController@getCommands');
	Route::resource('comandas', 'CommandsController');
	Route::get('comandas/create/eleccion/{eleccion}', 'CommandsController@eleccion');

	Route::get('comandas/facturar/cliente/{documento}', 'CommandsController@getClient');

	Route::get('verificar/{clave}', 'UsersController@verificar');
	Route::post('comandas/procesar-factura', ['uses' => 'CommandsController@process_invoice','as' => 'admin.comandas.procesar-factura']);

	Route::get('recibo/{id}', ['uses' => 'InvoicesController@pdf', 'as' => 'admin.recibo']);

		Route::get('comandas/agregar/{id}', [
			'uses' => 'CommandsController@add',
			'as'   => 'admin.comandas.add'
		]);

	Route::get('comandas/agregar/create/eleccion/{eleccion}', 'CommandsController@agregar');
	Route::get('comandas/{id}/lista', [
		'uses' => 'CommandsController@ready',
		'as' => 'admin.comandas.lista'
	]);
	Route::get('platos-del-dia', [
		'uses' => 'PortalController@index',
		'as'   => 'admin.platos-del-dia'
	]);
	Route::post('guardar-platos-dia', [
		'uses' => 'PortalController@save',
		'as'   => 'admin.guardar-platos-dia'
	]);

	//LICORES BEBIDAS

	Route::get('tragos/create/liqueurs/{type}',  'LiqueursController@getLiqueurs');
	Route::get('tragos/create/addliqueur/{id_l}', 'LiqueursController@addLiqueur');

	// INGREDIENTES BEBIDAS

	Route::get('tragos/create/ingredients/{type}', 'IngredientsController@getIngredients');
	Route::get('tragos/create/addingredient/{id_i}', 'IngredientsController@addIngredient');


	//INGREDIENTES SALSAS

	Route::get('sauces/create/ingredients/{type}', 'IngredientsController@getIngredients');
	Route::get('sauces/create/addingredient/{id_i}', 'IngredientsController@addIngredient');

	//INGREDIENTES SALSAS

	Route::get('jugos/create/ingredients/{type}', 'IngredientsController@getIngredients');
	Route::get('jugos/create/addingredient/{id_i}', 'IngredientsController@addIngredient');


	// INGREDIENTES PLATOS
	Route::get('platos/create/ingredients/{type}', 'IngredientsController@getIngredients');
	Route::get('platos/create/addingredient/{id_i}', 'IngredientsController@addIngredient');

	// LICORES
	Route::get('platos/create/liqueurs/{type}', 'LiqueursController@getLiqueurs');
	Route::get('platos/create/addliqueur/{id_l}', 'LiqueursController@addLiqueur');

	Route::post('clientes/busqueda', [
		'uses' => 'ClientsController@search',
		'as' => 'admin.clients.search'
	]);

});
