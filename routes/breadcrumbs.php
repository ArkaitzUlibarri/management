<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

//region Users

Breadcrumbs::for ('users.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Users', route('users.index'));
});

Breadcrumbs::for ("users.create", function ($trail) {
    $trail->parent('users.index');
    $trail->push('New User', route("users.create"));
});

Breadcrumbs::for ('users.show', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push($user->name, route('users.show', $user->id));
});

Breadcrumbs::for ('users.edit', function ($trail, $user) {
    $trail->parent('users.show', $user);
    $trail->push(trans('buttons.edit'), route('users.edit', $user->id));
});

//endregion
