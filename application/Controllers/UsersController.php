<?php

namespace App\Controllers;


class UsersController extends Controller
{
    public function index($t)
    {
        echo "index";
    }
    public function get($params)
    {
       $user = new \App\Models\Users($this->container);
       var_dump($user->get($params[1]));
    }
}