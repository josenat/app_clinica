<?php

use Illuminate\Database\Seeder;
use App\Models\MedicoEspecialidad;

class RelacionMedicoEspecialidadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // crear las siguientes relaciones por defecto
        $max = 4;
        for ($i=1; $i < $max; $i++) { 
	        MedicoEspecialidad::create([
		        'id_medico'       => $i,
		        'id_especialidad' => ($max - $i)		
	        ]);
	    }
    }
}
