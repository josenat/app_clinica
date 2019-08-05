<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // registrar usuarios 
        $this->call(UsersTableSeeder::class);  
        // registrar enfermedades 
        $this->call(EnfermedadsTableSeeder::class);                
        // registrar pacientes 
        $this->call(PacientesTableSeeder::class);   
        // registrar medicos 
        $this->call(MedicosTableSeeder::class);   
        // registrar especialidades medicas  
        $this->call(EspecialidadsTableSeeder::class);  
        // registrar relaciones de trabajo entre pacientes y medicos  
        $this->call(RelacionPacienteMedicosTableSeeder::class); 
        // registrar relaciones entre medicos y especialidades medicas
        $this->call(RelacionMedicoEspecialidadsTableSeeder::class); 
        // registrar citas medicas
        $this->call(RelacionPteCitaTableSeeder::class);
        // registrar consultas medicas
        $this->call(RelacionPteConsultaTableSeeder::class);        

            
    }
}
