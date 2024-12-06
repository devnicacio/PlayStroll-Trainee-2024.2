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
        $page = 1;
        if(isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])){
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0){
                return redirect('admin/tabela-de-posts');
            }
        }

        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAllPosts('posts');

        

        $posts = App::get('database')->selectAll('posts', $inicio, $itensPage);

        $total_pages = ceil($rows_count/$itensPage);

        if($page > $total_pages){
            header('Location: /posts?paginacaoNumero=1');
            exit;
        }

        return view('admin/tabela-de-posts', compact('posts', 'page', 'total_pages'));
    }
    public function updatePost(){
        $parameters = [
            "id" => $_POST["id"],
            "title" => $_POST["title"],
            "content" => $_POST["content"],
            "avaliation" => $_POST["avaliation"],
        ];

        App::get("database")->updatePost("posts", $parameters, $_FILES["image_capa"], $_FILES["image_retrato"]);
        redirect("app/views/admin/tabela-de-posts");
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
        $id = $_POST['iddelete_post'];
        unlink($_POST['iddelete_capa']);
        unlink($_POST['iddelete_retrato']);

        App::get("database")->deletaPost('posts', $id);

        header('Location: /admin/tabela-de-posts');
    }
    
}
?>