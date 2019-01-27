<?php

$router->add('GET', '/', '\App\Controllers\UsersController::index');

$router->add('GET', '/users/(\d+)', '\App\Controllers\UsersController::get');
