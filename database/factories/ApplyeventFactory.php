<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Applyevent;
use Faker\Generator as Faker;

$factory->define(Applyevent::class, function (Faker $faker) {
    return [
    	'ev_mode' => 'Online',
    	'ev_title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    	'ev_dura' => 'Single Day',
    	'ev_start' => now(),
    	'ev_end' => now(),
    	'ev_time' => '08:00 PM',
    	'ev_venue' => $faker->name,
    	'ev_city' => $faker->name,
        'ev_link' => $faker->unique()->safeEmail,
        'ev_by' => $faker->unique()->safeEmail,
        'ev_pic' => '3event-1619759434.JPG',
        'created_by_id' => '3',
        'ev_status' => 'Approve', 
    ];
});
