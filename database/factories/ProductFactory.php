<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$images = [
    // 'https://vignette.wikia.nocookie.net/lotr/images/8/87/Ringstrilogyposter.jpg/revision/latest?cb=20070806215413' => '0',
    'http://t0.gstatic.com/images?q=tbn:ANd9GcQhYjUIu2o5v5u3rfJpCq5Cz0Q9WK--XdYxai_N2d0ImohPiIOp' => '1',
    'https://redhotarts.com.au/wp-content/uploads/sites/41/titanic.jpg' => '2',
    'https://specials-images.forbesimg.com/imageserve/5d82b27a18444200084dd6dc/960x0.jpg' => '3'
];

$factory->define(Product::class, function (Faker $faker) use ($images) {
    return [
        'title' => $faker->name,
        'description' => 'Sunt omnis perspiciatis vel et libero. Enim debitis qui omnis voluptas sit et a. Dolores eum et tempora delectus et. Optio quia et animi illum.',
        'price' => rand(10,500),
        'imagePath' => array_rand($images)
    ];
});
