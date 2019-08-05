<?php

use Illuminate\Database\Seeder;
use App\Models\Medico;

class MedicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// crear medicos
        factory(Medico::class, 5)->create();
    }
}
