<?php

namespace Tresle;

use Tresle\Exception\HttpException;

class Router
{
    /**
     * @var array
     */
    private $routes = [];

    /**
     * @param string $typeAction
     * @param string $controller
     * @param mixed $callback funcao anonima
     * @return void
     */
    public function add(string $typeAction, string $controller, $callback)
    {
        $typeAction = strtolower($typeAction);

        /**
         * O caracter / eh especial, entao temos que transformar em \/
         */
        $controller = str_replace('/', '\/', $controller);

        /**
         * Monta a expressao regular
         */
        $controller = '/^'. $controller .'$/';

        $this->routes[$typeAction][$controller] = $callback;
    }

    /**
     * @return string
     */
    public function getCurrentUrl()
    {
        $url = $_SERVER['PATH_INFO'] ?? '/';

        /**
         * Ignora a ultima /
         */
        if(strlen($url) > 1){
            $url = rtrim($url, '/');
        }
        return $url;
    }

    /**
     * @return mixed
     */
    public function run()
    {
        /**
         * Recebe o verbo da requisicao
         */
        $typeAction = strtolower($_SERVER['REQUEST_METHOD']);
        /**
         * $this->routes[$typeAction] -> Percorre apenas o verbo da requisicao
         */
        $routes = $this->routes[$typeAction];
        if(empty($routes)){
            throw new HttpException("Página não encontrada", 404);
        }

        $url = $this->getCurrentUrl();

        /**
         * $route    -> expressao regular
         * $callback -> funcao anonima
         */
        foreach ($routes as $route => $callback){

            /**
             * Executa a expressao regular separando o controller dos parametros
             * exemplo: /product/2121
             * $params = array(2) {
             *               [0]=>
             *                  string(14) "/products/2121"
             *               [1]=>
             *                  string(4) "2121"
             *           }
             *
             */
            if(preg_match($route, $url, $params)){

                /**
                 * $params eh passado via parametro para a funcao callback
                 * ex:
                 * $router->add('/products/(\d+)', function($params){
                 *    return "produtos ".$params[1]; // produtos 2121
                 * });
                 */
                return $callback($params);
            }
        }
        throw new HttpException("Página não encontrada", 404);
    }
}