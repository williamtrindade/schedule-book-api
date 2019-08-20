<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Atividade;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Atividade::class, function (Faker $faker) use ($factory) {
    /**
     * Generate a random year
     */

    $year  = rand(2009, 2016);
    /**
     *  Generate a random month
     */
    $month = rand(1, 12);

    /**
     * Generate a random day
     */
    $day   = rand(1, 28);

    /**
     * Create a date
     */
    $date = Carbon::create($year,$month ,$day , 0, 0, 0);
    return [
        'inicio'    => $date->format('Y-m-d H:i:s'),
        'fim'       => $date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s'),
        'conclusao' => $date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s'),
        'status'    => $faker->randomElement(['aberta', 'concluida']),
        'titulo'    => $faker->word,
        'descricao' => $faker->word,
        'user_id'   => $factory->create(App\User::class)->id,
    ];
});
