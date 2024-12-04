<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class IntegracaoController{
    //Site
    public function getIndex(){
        return view('site/index');
    }

    // Paginação Lista de Posts
    public function index()
    {
        $posts = App::get('database')->select('posts');
        return view('site/lista-de-posts', compact('posts'));
    }


    //Post Individual

    public function exbibirPostIndividual(){
        $postId = isset($_GET['id']) ? $_GET['id'] : null;

        if (!$postId) {
            header('Location: /lista-de-posts');
            exit;
        }

        $post = App::get('database')->selectOne(
            'SELECT posts.*, users.name AS author_name, users.image AS author_image
            FROM posts
            INNER JOIN users ON posts.id_user = users.id
            WHERE posts.id = :id',
            ['id' => $postId]
        );

        if (!$post) {
            header('Location: /lista-de-posts');
            exit;
        }

        return view('site/post-individual', ['post' => $post]);
    }

    
    
}
?>