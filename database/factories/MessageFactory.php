<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    do{
        $from = rand(1, 5);
        $to = rand(1, 5);
    }while($from === $to);

    return [
        'from' => $from,
        'to' => $to,
        'text' => $faker->sentence,
    ];
});
