<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'project_id' => (\App\Models\Project::all())->random()->id,
        'name' => $faker->unique()->name(),
        'enabled' => $faker->boolean(95),
    ];
});

$factory->afterCreating(Group::class, function (Group $group, $faker) {
    $group->name = 'Group' . ' ' . $group->id;
    $group->save();
});
