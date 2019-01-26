<?php

$router->add('GET', '/', function() use ($container){
    return "home";
});

$router->add('GET', '/users/(\d+)', function($params)  use ($container){

    $user = new \App\Models\Users($container);
    var_dump($user->get($params[1]));

    return "users ";
});
