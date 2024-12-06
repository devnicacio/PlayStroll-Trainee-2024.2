<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class paginacaoListaPostsController
{
    public function index()
    {
        $page = 1;
        if(isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])){
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0){
                return redirect('site/lista-de-posts');
            }
        }

        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAllPosts('posts');

        

        $posts = App::get('database')->selectAll('posts', $inicio, $itensPage);

        $total_pages = ceil($rows_count/$itensPage);

        if($page > $total_pages){
            header('Location: admin/posts?paginacaoNumero=1');
            exit;
        }

        return view('site/lista-de-posts', compact('posts', 'page', 'total_pages'));
    }
}