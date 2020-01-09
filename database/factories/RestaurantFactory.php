<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'branch' => $faker->streetName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'logo' => $faker->imageUrl(),
        'address' => $faker->address,
        'housenumber' => $faker->streetAddress,
        'postcode' => $faker->postcode,
        'city' => $faker->city,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'url' => $faker->url,
        'open' => $faker->numberBetween(1,3),
        'bestMatch' => $faker->numberBetween(100,400),
        'newestScore' => $faker->randomNumber(),
        'ratingAverage' => $faker->numberBetween(0,9),
        'popularity' => $faker->numberBetween(1,200),
        'deliveryCosts' => $faker->randomFloat(2,5,25),
        'minimumOrderAmount' => $faker->randomFloat(2,0,10),
    ];
});
