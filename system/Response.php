<?php
namespace Tresle;

use Symfony\Component\HttpFoundation\Request;

class Response
{
    /**
     * @param $controllerAction
     * @param $params
     */
    public function __invoke($controllerAction, $params, $container)
    {
        /**
         * Recebe as requisicoes que não são do tipo POST e
         * passa os dados dessa requisição para o POST
         */
        parse_str(file_get_contents("php://input"), $_POST);

        $request = new Request(
            $_GET,
            $_POST,
            $params,
            $_COOKIE,
            $_FILES,
            $_SERVER
        );

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
        $response = call_user_func_array($controller, ["params" => $request]);
        if(is_array($response)){
            $response = json_encode($response);
        }
        echo $response;
    }


}