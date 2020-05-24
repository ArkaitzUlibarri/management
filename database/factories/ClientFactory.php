<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => 'Client',
        'description' => 'Description',
    ];
});

$factory->afterCreating(Client::class, function (Client $client, $faker) {
    $client->name = $client->name . ' ' . $client->id;
    $client->description = $client->name . ' ' . $client->description;
    $client->save();
});
