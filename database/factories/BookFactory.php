<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\Author;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->name(),
        // 'isbn' => $faker->numberBetween('123456789', '987654321'),
        'isbn' => $faker->isbn10(),
        'pages' => rand(1, 800),
        'about' => $faker->paragraph(7),
        'author_id' => factory(Author::class)->create()->id
    ];
});
