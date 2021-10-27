<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        "article_title" => $faker->text(rand(15,50)),
        "article_description" => $faker->text(rand(500,1000)),
        "user_id" => \App\User::all()->random()->id,
        "category_id" => \App\Category::all()->random()->id,
    ];
});
