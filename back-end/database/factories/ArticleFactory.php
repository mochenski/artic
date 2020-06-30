<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'slug' => $faker->unique()->slug(3),
        'title' => $faker->sentence(3),
        'excerpt' => $faker->sentence(10),
        'body' => $faker->text(1000),
    ];
});
