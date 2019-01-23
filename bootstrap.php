<?php

require __DIR__."/vendor/autoload.php";

$router = new \Tresle\Router();

$router->add('/', function(){
    return "home";
});

$router->add('/products', function(){
    return "produtos";
});

echo $router->run();
