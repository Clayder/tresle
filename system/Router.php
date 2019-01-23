<?php

namespace Tresle;


class Router
{
    /**
     * @var array
     */
    private $routes = [];

    /**
     * @param string $pattern
     * @param $callback funcao anonima
     * @return void
     */
    public function add(string $pattern, $callback)
    {
        $this->routes[$pattern] = $callback;
    }

    /**
     * @return void
     */
    public function run()
    {
        $route = $_SERVER['PATH_INFO'] ?? '/';
        if(array_key_exists($route, $this->routes)){
            return $this->routes[$route]();
        }
        return "Página não encontrada";
    }
}