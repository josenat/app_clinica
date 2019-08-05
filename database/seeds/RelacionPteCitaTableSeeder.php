<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Cita;

class RelacionPteCitaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // crear las siguientes citas por defecto
        $faker = Faker::create();
        for ($i=1; $i <= 3; $i++) { 
	        Cita::create([
		        'id_paciente_med' => $i,
		        'fecha_cita'      => $faker->date($format = 'Y-m-d', $min = 'now')		        		
	        ]);
	    }
    }
}
