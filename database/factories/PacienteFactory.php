<?php

use Faker\Generator as Faker;
use App\Models\Paciente;

$factory->define(Paciente::class, function (Faker $faker) {
    return [ 
    	'dni'       => $faker->unique()->numberBetween($min = 16852369, $max = 25485123),
        'nombre'    => $faker->name,
        'apellido'  => $faker->name,
        'fecha_nac' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'direccion' => $faker->address		
    ];
});