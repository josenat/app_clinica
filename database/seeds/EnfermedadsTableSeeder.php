<?php

use Illuminate\Database\Seeder;
use App\Models\Enfermedad;

class EnfermedadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // por defecto creamos las siguientes enfermedades
        Enfermedad::create([
        	'nombre'    => 'RINITIS',
			'sistema'   => 'RESPIRATORIO'					
        ]);
        Enfermedad::create([
        	'nombre'    => 'FARINGITIS',
			'sistema'   => 'RESPIRATORIO'					
        ]);
        Enfermedad::create([
        	'nombre'    => 'GRIPE',
			'sistema'   => 'RESPIRATORIO'					
        ]);  
        Enfermedad::create([
        	'nombre'    => 'HIPERTENSION',
			'sistema'   => 'CIRCULATORIO'					
        ]);     
        Enfermedad::create([
        	'nombre'    => 'ARRITMIA',
			'sistema'   => 'CIRCULATORIO'					
        ]);   
        Enfermedad::create([
        	'nombre'    => 'GASTRITIS',
			'sistema'   => 'DIGESTIVO'					
        ]);   
        Enfermedad::create([
        	'nombre'    => 'GASTROENTERITIS',
			'sistema'   => 'DIGESTIVO'					
        ]);     
        Enfermedad::create([
        	'nombre'    => 'DISPEPSIA',
			'sistema'   => 'DIGESTIVO'					
        ]);                                                
    }
}
