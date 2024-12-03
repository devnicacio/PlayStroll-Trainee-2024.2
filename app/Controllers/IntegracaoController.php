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
        $page = 1;
        if(isset($_GET['navNumero']) && !empty($_GET['navNumero'])){
            $page = intval($_GET['navNumero']);

            if($page <= 0){
                return redirect('site/lista-de-posts');
            }
        }

        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('posts');

        

        $posts = App::get('database')->selectAll('posts', $inicio, $itensPage);

        $total_pages = ceil($rows_count/$itensPage);

        if($page > $total_pages){
            header('Location: /posts?navNumero=1');
            exit;
        }

        return view('site/lista-de-posts', compact('posts', 'page', 'total_pages'));
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

    //Lista de Posts

    public function exibirListaDePosts(){
        return view('site/lista-de-posts');
    }

}
?>