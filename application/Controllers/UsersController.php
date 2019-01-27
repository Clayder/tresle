<?php

namespace App\Controllers;


use Symfony\Component\HttpFoundation\Request;

class UsersController extends Controller
{
    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        echo "index";
    }

    /**
     * @param Request $request
     */
    public function get(Request $request)
    {
       $user = new \App\Models\Users($this->container);
       return $user->get($request->attributes->get(1));
    }
}