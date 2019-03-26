<?php

namespace App\Controllers;


use App\Models\Users;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends Controller
{
    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        $user = new Users($this->container);
        $user->create(['name'=> 'Erick']);
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