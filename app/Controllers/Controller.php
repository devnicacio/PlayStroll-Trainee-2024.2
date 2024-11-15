<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

/* Recomendo que seja utilizado no começo de todas as funções o nome do método usado. Exemplo: getIndex. */
class Controller{
    //Site
    public function getIndex(){
        return view('site/index');
    }

    //Admin
    public function getTabelaDePosts(){
        $posts = App::get('db_playstroll')->selectAll('posts');
        return view('admin/tabela-de-posts', compact($posts));
    }
    public function postPost(){
        $parameters = [
            "nome" => $_POST["name"],
            
        ];

        App::get("db_playstroll")->insert("post", $parameters);
        header("Location: user")
    }
?>