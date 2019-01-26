<?php

$router->add('GET', '/', function(){
    return "home";
});

$router->add('GET', '/products/(\d+)', function($params){
    return "produtos ".$params[1];
});