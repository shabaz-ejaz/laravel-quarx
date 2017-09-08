<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/*
|--------------------------------------------------------------------------
| Book Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Book::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		' title' => 'nobis',
		'author' => 'est',
    ];
});

/*
|--------------------------------------------------------------------------
| Book Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Book::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		' title' => 'cupiditate',
		'author' => 'quo',
    ];
});

/*
|--------------------------------------------------------------------------
| Toy Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Toy::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		' title' => 'eaque',
		'author' => 'quibusdam',
    ];
});

/*
|--------------------------------------------------------------------------
| Category Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		'title' => 'voluptatem',
		'author' => 'enim',
    ];
});

/*
|--------------------------------------------------------------------------
| Post Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    return [
        // Post table data    ];
});

/*
|--------------------------------------------------------------------------
| Post Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		'name' => 'et',
		'author' => 'facilis',
    ];
});

/*
|--------------------------------------------------------------------------
| Tag Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		'name' => 'nobis',
		'author' => 'nesciunt',
    ];
});

/*
|--------------------------------------------------------------------------
| UserMeta Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\UserMeta::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'phone' => $faker->phoneNumber,
        'marketing' => 1,
        'terms_and_cond' => 1,
    ];
});

$factory->define(App\Models\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => 'member',
        'label' => 'Member',
    ];
});

/*
|--------------------------------------------------------------------------
| Team Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Team::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'name' => $faker->name
    ];
});
/*
|--------------------------------------------------------------------------
| Tag Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		'name' => 'maiores',
		'author' => 'quibusdam',
    ];
});

/*
|--------------------------------------------------------------------------
| Article Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Article::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		'name' => 'et',
		'author' => 'commodi',
    ];
});
