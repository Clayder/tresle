<?php

require __DIR__."/vendor/autoload.php";

$router = new \Tresle\Router();

require __DIR__.'/config/containers.php';

require __DIR__ . '/routes/web.php';

try{
     $result = $router->run();
     $response = new Tresle\Response();
     $response($result['action'], $result['params']);
}catch (\Tresle\Exception\HttpException $e){
    echo json_encode(['error' => $e->getMessage()]);
}
