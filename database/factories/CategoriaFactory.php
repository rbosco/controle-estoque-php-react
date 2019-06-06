<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use Estoque\Entities\Categoria;

$factory->define(Categoria::class, function (Faker $faker) {
    return [
        'description' => 'limpeza',
    ];
});
