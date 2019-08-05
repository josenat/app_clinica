<?php

use Faker\Generator as Faker;
use App\Models\Especialidad;

$factory->define(Especialidad::class, function (Faker $faker) {
    return [         
        'nombre'      => $faker->unique()->randomElement(['OTORRINO', 'CARDIOLOGO', 'GASTROENTEROLOGO']),
		'descripcion' => function (array $especialidad) 
			{
				if ($especialidad['nombre'] == 'OTORRINO') {
					return 'La otorrinolaringología es la especialidad médica que se encarga del estudio de las enfermedades del oído, puede haber un médico para cada oído ya que cada oído puede presentar características opuestas al otro.';
				
				} elseif ($especialidad['nombre'] == 'CARDIOLOGO') {
					return 'La cardiología es la rama de la medicina que se encarga del estudio, diagnóstico y tratamiento de las enfermedades del corazón y del aparato circulatorio.';
				
				} elseif ($especialidad['nombre'] == 'GASTROENTEROLOGO') {
					return 'La gastroenterología es la especialidad médica que se ocupa de las enfermedades del aparato digestivo y órganos asociados. ';
				}   
			},                 
    ];
});