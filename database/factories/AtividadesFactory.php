<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Atividade;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Atividade::class, function (Faker $faker) use ($factory) {
    $year = rand(2009, 2016);
    $month = rand(1, 12);
    $day = rand(1, 28);

    $date = Carbon::create($year,$month ,$day , 0, 0, 0);
    return [
        'data_de_inicio'    => $date->format('Y-m-d H:i:s'),
        'data_de_prazo'     => $date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s'),
        'data_de_conclusao' => $date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s'),
        'status'            => $faker->randomElement(['aberta', 'concluida']),
        'tituto'            => $faker->word,
        'descricao'         => $faker->word,
        'user_id'           => $factory->create(App\User::class)->id,
    ];
});
