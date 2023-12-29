<?php

// Include Depandencies
require __DIR__ . '/../vendor/autoload.php';

// Init Router
// @see https://github.com/dannyvankooten/AltoRouter
$router = new AltoRouter();

// Set BaseURL
$router->setBasePath($_SERVER['BASE_URI']);

//! Raods -> MainController
// ------------------------------------------------------
// => home [static]
$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => '\App\Controller\MainController'
    ],
    'main-home'
);

//! Roads -> ServiceWorksiteAPI
// ------------------------------------------------------
// => browse [static]
$router->map(
    'GET',
    '/api/services',
    [
        'method' => 'browse',
        'controller' => '\App\Controller\Api\ServiceWorksiteController'
    ],
    'serviceWorksite-browse'
);

// => add [static]
$router->map(
    'POST',
    '/api/service/add',
    [
        'method' => 'add',
        'controller' => '\App\Controller\Api\ServiceWorksiteController'
    ],
    'serviceWorksite-add'
);

// => delete [dynamic]
$router->map(
    'DELETE',
    '/api/service/delete/[i:id]',
    [
        'method' => 'delete',
        'controller' => '\App\Controller\Api\ServiceWorksiteController'
    ],
    'serviceWorksite-delete'
);

//! Match URl
// ------------------------------------------------------
$match = $router->match();

//! Dispatcher
// ------------------------------------------------------
// @see : https://packagist.org/packages/benoclock/alto-dispatcher
$dispatcher = new Dispatcher($match, '\App\Controller\ErrorController::page404');
$dispatcher->dispatch();