<?php

require __DIR__."/vendor/autoload.php";

$router = new \Tresle\Router();

$router->add('GET', '/', function(){
    return "home";
});

$router->add('GET', '/products/(\d+)', function($params){
    return "produtos ".$params[1];
});

try{
    echo $router->run();
}catch (\Tresle\Exception\HttpException $e){
    echo json_encode(['error' => $e->getMessage()]);
}
