<?php

namespace App\Controllers;


use Pimple\Container;

abstract class Controller
{
    /**
     * @var Container
     */
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

}