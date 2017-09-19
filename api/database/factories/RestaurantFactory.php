<?php 

$factory->define(App\Restaurant::class, function (Faker\Generator $faker) {
    
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'description' => $faker->text,
        'image' => $faker->imageUrl($width = 640, $height = 480),
    ];

});