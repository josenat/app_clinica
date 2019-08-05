<?php

use Faker\Generator as Faker;
use App\Models\Medico;

$factory->define(Medico::class, function (Faker $faker) {
    return [ 
        'nombre'    => $faker->name,
        'apellido'  => $faker->name,
        'direccion' => $faker->address,		
		'contrato'  => $faker->randomElement([1, 2])            
    ];
});
