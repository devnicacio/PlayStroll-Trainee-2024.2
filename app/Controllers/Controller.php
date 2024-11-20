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
        $posts = App::get('database')->selectAll('posts');
        return view('admin/tabela-de-posts', compact($posts));
    }
    public function postPost(){
        $parameters = [
            "nome" => $_POST["name"],
            
        ];

        App::get("database")->insert("posts", $parameters);
        header("Location: user");
    }

    public function create() {
        $parameters = [
            'title' => $_POST['title'],
            'avaliation' => $_POST['avaliation'],
            'create_at' => $_POST['create-at'],
            'content' => $_POST['content'],
            'id_user' => 1,
        ];
        
        App::get("database")->inserePost("posts", $parameters, $_FILES['image-capa'], $_FILES['image-retrato']);
        header('Location: /admin/tabela-de-posts');
    }

    public function delete_post(){
        $post = $_POST['iddelete_post'];
        unlink($_POST['iddelete_capa']);
        unlink($_POST['iddelete_retrato']);

        App::get("database")->deletaPost('posts', 'id');

        header('Location: /posts');
    }

}
?>