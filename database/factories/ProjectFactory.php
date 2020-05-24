<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name(),
        'description' => 'Description',
        'client_id' => (\App\Models\Client::all())->random()->id,
        'start_date' => $faker->dateTimeBetween('-10 years', 'now'),
        'end_date' => null,
//        'manager_id' => '',
    ];
});

$factory->afterCreating(Project::class, function (Project $project, $faker) {
    $project->name = 'Project' . ' ' . $project->id;
    $project->description = $project->name . ' ' . $project->description;
    $project->end_date = $faker->boolean(25) ? Carbon::parse($project->start_date)->addMonth() : null;
    $project->save();
});
