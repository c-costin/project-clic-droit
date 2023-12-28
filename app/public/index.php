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



//! Match URl
// ------------------------------------------------------
$match = $router->match();

//! Dispatcher
// ------------------------------------------------------
// @see : https://packagist.org/packages/benoclock/alto-dispatcher
$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::page404');
$dispatcher->dispatch();