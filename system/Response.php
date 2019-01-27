<?php
namespace Tresle;


class Response
{
    /**
     * @param $controllerAction
     * @param $params
     */
    public function __invoke($controllerAction, $params, $container)
    {
        if(is_string($controllerAction)){
            $controller = explode("::", $controllerAction);

            /**
             * Instancia a classe controller
             */
            $controller[0] = new $controller[0]($container);
        }
        /**
         * Executa o metodo do controller
         * e realiza a passagem de parametros
         */
        echo call_user_func_array($controller, [$params]);
    }


}