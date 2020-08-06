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

Breadcrumbs::for('empresas', function ($trail) {
    $trail->parent('home');
    $trail->push('Lista de empresas', route('empresas'));
});

Breadcrumbs::for('editarEmpresa', function ($trail,$empresa) {
    $trail->parent('empresas');
    $trail->push('Actualizar empresa', route('editarEmpresa',$empresa->id));
});

Breadcrumbs::for('areas', function ($trail,$empresa) {
    $trail->parent('empresas');
    $trail->push('Áreas de trabajo', route('areas',$empresa->id));
});

Breadcrumbs::for('fichas', function ($trail) {
    $trail->parent('home');
    $trail->push('Listado de fichas', route('fichas'));
});


