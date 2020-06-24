<?php
Breadcrumbs::for('welcome', function ($trail) {
    $trail->push('Bienvenido', url('/'));
});
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('welcome');
    $trail->push('Acceder', route('login'));
});

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Inicio', route('home'));
});
