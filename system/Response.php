<?php
namespace Tresle;


class Response
{
    /**
     * @param $controllerAction
     * @param $params
     */
    public function __invoke($controllerAction, $params)
    {
        echo $controllerAction($params);
    }
}