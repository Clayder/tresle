<?php
namespace App\Events;


class UsersCreated
{
    /**
     * @param $e
     */
    public function __invoke($e)
    {
        $event  = $e->getName();
        $params = $e->getParams();
        echo sprintf('Disparei o evento "%s", com parametros: %s', $event, json_encode($params));
    }
}