<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use Estoque\Entities\Produto;

$factory->define(Produto::class, function (Faker $faker) {
    return [
        'description' => 'Sabão',
        'category_id' => 1
    ];
});
