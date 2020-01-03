<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Copia;
use App\Libro;
use App\Estado;
use Faker\Generator as Faker;

$factory->define(Copia::class, function (Faker $faker) {
    return [
        'cota' => substr($faker->name(), 0, rand(4, 20)),
        'libro_id' => Libro::all()->random()->id,
        'estado_id' => Estado::all()->random()->id
    ];
});
