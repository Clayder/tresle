<?php

$middlewares = [
    'before' => [
        function($c){
            echo "antes";
        },
        function($c){
            echo "antes 2";
        }
    ],
    'after' => [
        function($c){
            echo "depois";
        },
        function($c){
            echo "depois 2";
        }
    ]
];