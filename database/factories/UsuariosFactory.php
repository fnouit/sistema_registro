<?php

use Faker\Generator as Faker;
use App\Usuario;

$factory->define(Usuario::class, function (Faker $faker) {
   
    return [
        'nombre' => $faker->firstName,
        'apellido_p' => $faker->lastName,
        'apellido_m' => $faker->lastName,
        //'genero' => $faker->randomElements(['Sin especificar', 'Hombre', 'Mujer']),
        'genero' => $faker->randomElements(['Hombre', 'Mujer','Sin especificar'])[0],
        'correo' => $faker->freeEmail,            
        'rfc' => $faker->swiftBicNumber,
        'telefono' => $faker->phoneNumber,
        'facebook' => $faker->safeColorName,
        'twitter' => $faker->safeColorName,
         'num_personal' => $faker->postcode,
         'delegacion' => $faker->company,
         'zona_e' => $faker->buildingNumber,
         'clave_ct' => $faker->swiftBicNumber,    
         'confirmado' => $faker->numberBetween(0,1),
         'codigo_confirmacion' => $faker->numberBetween(11111111,99999999)
    ];
});
