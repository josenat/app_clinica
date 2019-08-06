<?php

use Faker\Generator as Faker;
use App\Models\Medico;

$factory->define(Medico::class, function (Faker $faker) {
    return [ 
    	'dni'       => $faker->unique()->numberBetween($min = 10852369, $max = 15485123),
        'nombre'    => $faker->name,
        'apellido'  => $faker->name,
        'direccion' => $faker->address,		
		'contrato'  => $faker->randomElement([1, 2])            
    ];
});
