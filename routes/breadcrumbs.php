<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

//region Users

Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Users', route('users.index'));
});

Breadcrumbs::for("users.create", function ($trail) {
    $trail->parent('users.index');
    $trail->push('New User', route("users.create"));
});

Breadcrumbs::for('users.show', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push($user->name, route('users.show', $user->id));
});

Breadcrumbs::for('users.edit', function ($trail, $user) {
    $trail->parent('users.show', $user);
    $trail->push(trans('buttons.edit'), route('users.edit', $user->id));
});

//endregion

//region Users

Breadcrumbs::for('contractTypes.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Contract Types', route('contractTypes.index'));
});

Breadcrumbs::for("contractTypes.create", function ($trail) {
    $trail->parent('contractTypes.index');
    $trail->push('New Contract Type', route("contractTypes.create"));
});

Breadcrumbs::for('contractTypes.show', function ($trail, $contractType) {
    $trail->parent('contractTypes.index');
    $trail->push($contractType->code . ' - ' . $contractType->name, route('contractTypes.show', $contractType->id));
});

Breadcrumbs::for('contractTypes.edit', function ($trail, $contractType) {
    $trail->parent('contractTypes.show', $contractType);
    $trail->push(trans('buttons.edit'), route('contractTypes.edit', $contractType->id));
});

//endregion
