<?php




$router->add('GET', '/products/(\d+)', function($params){
    return "produtos ".$params[1];
});
