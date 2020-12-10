<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert(array (
			'slug' => '1',
			'name' => 'SuperUsuario',
            'permissions' => '{"registros.view" : true,"registros.edit" : true,"registros.delete": true,"clientes.view" : true,"clientes.edit" : true,"clientes.delete": true,"personal.view" : true,"personal.edit" : true,"personal.delete": true,"inventario.view" : true,"inventario.edit" : true,"inventario.delete": true,"compra.view" : true,"compra.edit" : true,"compra.delete": true,"servicios.view" : true,"servicios.edit" : true,"servicios.delete": true,"menu.view" : true,"menu.edit" : true,"menu.delete": true,"comandas.view" : true,"comandas.edit" : true,"comandas.delete": true,"platos.view" : true,"platos.edit" : true,"platos.delete": true,"nomina.view" : true,"nomina.edit" : true,"nomina.delete": true,"asistencias.view" : true,"asistencias.edit" : true,"asistencias.delete": true,"prenominas.view" : true,"prenominas.edit" : true,"prenominas.delete": true,"nominas.view" : true,"nominas.edit" : true,"nominas.delete": true,"planificacion.view" : true,"planificacion.edit" : true,"planificacion.delete": true}'
        ));

        \DB::table('roles')->insert(array(
            'slug' => '2',
        	'name' => 'Administrador',
            'permissions' => '{"mantenimiento.view" : true,"mantenimiento.edit" : true,"mantenimiento.delete": true, "usuarios.view" : true,"usuarios.edit" : true,"usuarios.delete": true,"bd.view" : true,"bd.edit" : true,"bd.delete": true,"bitacora.view" : true,"bitacora.edit" : true,"bitacora.delete": true}'
        ));

        \DB::table('roles')->insert(array(
        	'slug' => '3',
			'name' => 'Encargado',
            'permissions' => '{"compra.view" : true,"compra.edit" : true,"compra.delete": true,"nomina.view" : true,"nomina.edit" : true,"asistencias.view" : true,"asistencias.edit" : true,"asistencias.delete": true,"planificacion.delete": true,"planificacion.view" : true,"planificacion.edit" : true,"planificacion.delete": true}'
        ));

        \DB::table('roles')->insert(array(
        	'slug' => '4',
			'name' => 'Cocinero',
            'permissions' => '{"servicios.view" : true,"servicios.edit" : true,"servicios.delete": true,"menu.view" : true,"menu.edit" : true,"menu.delete": false,"comandas.view" : true,"comandas.edit" : false,"comandas.delete": false}'
        ));

        \DB::table('roles')->insert(array(
        	'slug' => '5',
			'name' => 'Cajero',
            'permissions' => '{"servicios:view" : true,"servicios.edit" : false,"servicios.delete" : false,"comandas.view" : true,"comandas.edit" : false,"comandas.delete" : false}'
        ));

        \DB::table('roles')->insert(array(
        	'slug' => '6',
			'name' => 'Mesonero',
            'permissions' => '{"servicios:view" : true,"servicios.edit" : false,"servicios.delete" : false,"comandas.view" : true,"comandas.edit" : true,"comandas.delete" : true}'
        ));

        \DB::table('roles')->insert(array(
            'slug' => '7',
            'name' => 'Cliente',
        ));

        \DB::table('roles')->insert(array(
            'slug' => '8',
            'name' => 'Chef',
            'permissions' => '{"servicios:view" : true,"servicios.edit" : false,"servicios.delete" : false,"menu.view" : true,"menu.edit" : true,"menu.delete": true,"comandas.view" : true,"comandas.edit" : false,"comandas.delete" : false,"platos.view" : true,"platos.edit" : false,"platos.delete": false,}'
        ));
    }
}
