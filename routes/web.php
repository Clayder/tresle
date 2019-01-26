<?php

$router->add('GET', '/', function() use ($container){
    $pdo = $container['db'];
    return "home";
});

$router->add('GET', '/products/(\d+)', function($params){
    return "produtos ".$params[1];
});
