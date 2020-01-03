<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Prestamo;
use App\User;
use App\Copia;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Prestamo::class, function (Faker $faker) {
    return [
        'cedula' => User::all()->random()->cedula,
        'copia_id' => Copia::all()->random()->id,
        'observacion' => $faker->sentence(),
        'fecha_de_prestamo' => Carbon::now(),
        'fecha_a_retornar' => Carbon::now()->addHours(6),
    ];
});
