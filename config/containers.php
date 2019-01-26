<?php

use Pimple\Container;

$container = new Container();

$container['db'] = function(){
    $database = "tresle";
    $host     =  "127.0.0.1";
    $dsn      = "mysql:host={$host};dbname={$database}";
    $userName = "root";
    $password = "";
    $options  = [
        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ];
    $pdo = new \PDO($dsn, $userName, $password, $options);
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    return $pdo;
};