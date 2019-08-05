<?php

use Faker\Generator as Faker;
use App\Models\Paciente;

$factory->define(Paciente::class, function (Faker $faker) {
    return [ 
        'nombre'    => $faker->name,
        'apellido'  => $faker->name,
        'fecha_nac' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'direccion' => $faker->address		
    ];
});