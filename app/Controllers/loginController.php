<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class loginController
{

    public function index()
    {
        return view('site/index');
    }

    public function efetuaLogin(){
        $email = $_POST('email');
        $senha = $_POST('password');

        $user = App::get(key: 'database')->verificaLogin($email, $senha);
    }
}

?>