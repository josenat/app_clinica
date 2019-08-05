<?php

use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// crear pacientes
        factory(Paciente::class, 10)->create();
    }
}
