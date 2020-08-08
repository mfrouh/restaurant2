<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Product;
use App\Restaurant;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt(12345678), // password
        'remember_token' => Str::random(10),
    ];
});
$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'state' => 'open',
        'delivery' => 1,
        'phone' => '01'.rand(0000000000,229999999),
        'address' => $faker->address,
        'description'=>$faker->name,
        'price_delivery'=>rand(5,15),
        'time_delivery'=>rand(10,30),
        'user_id'=>User::all()->random()->id,
    ];
});
$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'active'=>1,
    ];
});
$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'restaurant_id'=>Restaurant::all()->random()->id,
        'category_id'=>Category::all()->random()->id,
        'active'=>1,
        'description'=>$faker->name,
        'slug' => $faker->name,
        'price' => rand(1.00,200.00),
    ];
});
