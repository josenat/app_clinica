<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Consulta;

class RelacionPteConsultaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // crear las siguientes consultas por defecto
        $max   = 4; 
        $faker = Faker::create();        
        for ($i=1; $i < $max; $i++) { 
	        Consulta::create([
		        'id_paciente_med' => $i,
		        'id_enfermedad'   => ($max - $i),
		        'motivo'          => $faker->text(50),
		        'tratamiento'     => $faker->text(50)	        		
	        ]);
	    }
    }
}
