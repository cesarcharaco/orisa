<?php

use Illuminate\Database\Seeder;

class DeductionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('deductions')->insert(array (
            'SSO'  => '4',
        	'RPE'  => '5',
        	'RPVH' => '1'
        ));
    }
}

