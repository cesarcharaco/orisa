<?php

use Illuminate\Database\Seeder;

class DataEmployesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i < 10; $i++) {

        \DB::table('info_employees')->insert(array (
            'empleado_id' => $i,
            'codigo' => 'MO-00'.$i,
            'fecha_de_admision' => '02-03-2007',
            'contrato' => '',
            'duracion' => '30',
            'cestaticket' => 'No',
            'banco' => 'Mercantil',
            'cuenta_tipo' => 'Corriente',
            'cuenta_numero' => '114334233232'.$i,
        	));

        }
    }
}
