<?php

require __DIR__."/vendor/autoload.php";

$router = new \Tresle\Router();

require __DIR__.'/config/containers.php';
require __DIR__.'/config/middlewares.php';
require __DIR__.'/config/events.php';
require __DIR__ . '/routes/web.php';

try{
     $result = $router->run();
     $response = new Tresle\Response();

     foreach ($middlewares['before'] as $middleware){
         $middleware($container);
     }

     $response($result['action'], $result['params'], $container);

    foreach ($middlewares['after'] as $middleware){
        $middleware($container);
    }
}catch (\Tresle\Exception\HttpException $e){
    echo json_encode(['error' => $e->getMessage()]);
}
