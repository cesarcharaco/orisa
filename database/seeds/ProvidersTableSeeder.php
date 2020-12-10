<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
        
      	\DB::table('providers')->insert(array (
            'rif'          => 'J-00006372-9',
            'razon_social' => 'Alimentos Polar Comercial, C.A.',
            'ciudad' => 'Turmero',
            'calle' => ' 5 de marzo ',
            'habitacion' => '30-11',
            'direccion'    => 'Turmero Av/c. 5 de marzo 30-11',
            'operadora'    => '0800',
            'telefono'     => '3728242',
            'correo'       => 'carola.valdivia@fundacionempresaspolar.org',
        ));

      	\DB::table('providers')->insert(array (
            'rif'          => 'J-00032569-3',
            'razon_social' => 'C.A. Ron Santa teresa',
            'ciudad' => 'El consejo',
            'calle' => 'Av/C Bolivar',
            'habitacion' => 'galpon 34',
            'direccion'    => 'El consejo Av/C Bolivar galpon 34',
            'operadora'    => '0800',
            'telefono'     => '4002598',
            'correo'       => 'info@fundacionsantateresa.org',
        ));

        for ($i=0; $i<7; $i++) 
        { 
       		\DB::table('providers')->insert(array (
                'rif'          => $faker->randomElement($array = array ('J','C','G')).'-'.$faker->numberBetween($min = 200000000, $max = 25000000),
                'razon_social' => $faker->firstName,
                'ciudad' => $faker->cityPrefix,
                'calle' => $faker->streetName,
                'habitacion' => $faker->buildingNumber,
                'direccion'    => $faker->address,
                'operadora'    => '0412',
                'telefono'     => $faker->ean8,
                'correo'       => $faker->email,
        ));

	   }
    }
}
