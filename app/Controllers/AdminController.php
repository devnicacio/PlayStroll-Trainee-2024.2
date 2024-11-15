<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class AdminController
{

    public function index()
    {
        $users = App::get('database')->selectAll('users');
        return view('admin/lista-usuarios', compact('users'));
    }

    public function createUsers()
    {
        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'image' => $_POST['image']
        ]; 
        var_dump($_POST);
        exit();

        App::get('database')->insert('users', $parameters);

        header('Location: /users');
        
    }

}

?>