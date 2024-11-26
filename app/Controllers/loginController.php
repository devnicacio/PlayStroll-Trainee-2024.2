<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class LoginController
{

    public function index()
    {
        return view('site/index');
    }

    public function executaLogin(){
        $email = $_POST['email'];
        $senha = $_POST['password'];

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

    public function exibirLogin()
    {
        return view('site/login');
    }

    public function exibirDashboard()
    {
        return view('admin/dashboard');
    }
}

?>