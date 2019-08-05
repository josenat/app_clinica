<?php

use Illuminate\Database\Seeder;
use App\Models\PacienteMedico;

class RelacionPacienteMedicosTableSeeder extends Seeder
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
	        PacienteMedico::create([
		        'id_paciente' => $i,
		        'id_medico'	  => ($max - $i)		
	        ]);
	    }
    }
}
