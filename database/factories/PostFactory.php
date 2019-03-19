<?php

use App\User;
use Faker\Provider\Text;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Post::class, function ($faker) {
    return [
        'post_title' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
        'long_description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'short_description' => $faker->paragraph,
        'status'=> 1,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
