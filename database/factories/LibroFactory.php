<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Libro;
use App\Categoria;
use App\Autor;
use Faker\Generator as Faker;

$factory->define(Libro::class, function (Faker $faker) {
    return [
        'titulo' => $faker->name,
        'descripcion' =>  $faker->sentence(),
        'categoria_id' => Categoria::all()->random()->id,
        'autor_id' => Autor::all()->random()->id,
    ];
});
