<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;


class PermissionsComposer {

	/**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
	
	public function compose(View $view)
	{
		$permissions = [

			'registros' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],

			'clientes' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],

			'personal' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],

			'inventario' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],

			'compra' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],

			'servicios' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],

			'menu' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],

			'comandas' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],

			'platos' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],

			'nomina' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],

			'asistencias' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],

			'prenominas' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],

			'nominas' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],

			'planificacion' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],

			'mantenimiento' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],

			'usuarios' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],

			'bd' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			],
			
			'bitacora' => [
				'0' => 'view',
				'1' => 'create',
				'2' => 'edit',
				'3' => 'delete'
			]
		];

		$view->with('permissions', $permissions);
	}
}