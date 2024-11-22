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

        if($user != false){
            session_start();
            $_SESSION['id'] = $user->id;
            header('Location: /dashboard');
        }
        else{
            session_start();
            $_SESSION['mensagem-erro'] = "Usuário e/ou senha incorretos";
            header('Location: /login');
        }
    }
}

?>