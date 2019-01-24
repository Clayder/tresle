<?php

require __DIR__."/vendor/autoload.php";

$router = new \Tresle\Router();

$router->add('GET', '/', function(){
    return "home";
});

$router->add('GET', '/products/(\d+)', function($params){
    return "produtos ".$params[1];
});

echo $router->run();
