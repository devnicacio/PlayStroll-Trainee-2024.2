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

        

        $posts = App::get('database')->selectAll('posts', $inicio, $itensPage, null);
        
        $total_pages = ceil($rows_count/$itensPage);

        if($page > $total_pages){
            header('Location: /posts?paginacaoNumero=1');
            exit;
        }

        return view('admin/tabela-de-posts', compact('posts', 'page', 'total_pages'));
    }
    public function updatePost(){
        $parameters = [
            "title" => $_POST["title"],
            "content" => $_POST["content"],
            "avaliation" => $_POST["avaliation"],
            "create_at" => $_POST["create-at"],
        ];

        $id = $_POST["id"];

        $fotoAtualCapa = $_POST['fotoAtualCapa'];
        $fotoAtualRetrato = $_POST['fotoAtualRetrato'];

        $imageCapa = isset($_FILES['image_capa']) && $_FILES['image_capa']['size'] > 0 ? $_FILES['image_capa'] : null;
        $imageRetrato = isset($_FILES['image_retrato']) && $_FILES['image_retrato']['size'] > 0 ? $_FILES['image_retrato'] : null;

        App::get("database")->updatePost("posts", $id, $parameters, $imageCapa, $imageRetrato, $fotoAtualCapa, $fotoAtualRetrato);
        header('Location: /tabela-de-posts');
    }

    public function create() {
        session_start();
        $parameters = [
            'title' => $_POST['title'],
            'avaliation' => $_POST['avaliation'],
            'create_at' => date('Y-m-d'),
            'content' => $_POST['content'],
            'id_user' => $_SESSION['id'],
        ];
        
        App::get("database")->inserePost("posts", $parameters, $_FILES['image_capa'], $_FILES['image_retrato']);
        header('Location: /tabela-de-posts');
    }

    public function delete_post(){
        $id = $_POST['iddelete_post'];
        unlink($_POST['iddelete_capa']);
        unlink($_POST['iddelete_retrato']);

        App::get("database")->deletaPost('posts', $id);

        header('Location: /tabela-de-posts');
    }
    
}
?>