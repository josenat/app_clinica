<?php

use Illuminate\Database\Seeder;
use App\Models\Especialidad;

class EspecialidadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// crear especialidades medicas
        factory(Especialidad::class, 3)->create();
    }
}
