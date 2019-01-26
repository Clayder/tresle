<?php

require __DIR__."/vendor/autoload.php";

$router = new \Tresle\Router();

require __DIR__.'/config/routes.php';

try{
    echo $router->run();
}catch (\Tresle\Exception\HttpException $e){
    echo json_encode(['error' => $e->getMessage()]);
}
