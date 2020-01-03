<?php

use App\User;
use App\Role;
use App\Carrera;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'cedula' => $faker->unique()->numberBetween($min = 1, $max = 50),
        'nombres' => $faker->name,
        'apellidos' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'rol_id' => Role::all()->random()->id,
        'carrera_id' => Carrera::all()->random()->id,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
