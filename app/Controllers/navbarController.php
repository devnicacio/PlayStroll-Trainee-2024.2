<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class NavbarController{
    public function index()
    {
        return view('site/navbar');
    }
}