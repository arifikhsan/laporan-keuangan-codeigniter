<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $auth = service('authentication');
        // dd($auth);
        return view('welcome', compact('auth'));
    }

    public function dashboard()
    {
        echo "selemat datang dihalaman dashboard admin";
    }
}
