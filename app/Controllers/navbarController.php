<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class navbarController{
    public function index(){
        if(isset($_GET['busca'])){
            $search = "&busca=" . $_GET['busca'];
            $total_itens = App::get('database')->countSearch('posts', $_GET['busca']);

            $total_pages = ceil($total_itens/5);

            if(isset($_GET['paginacaoNumero']) 
            && $_GET['paginacaoNumero'] >= 1 && $_GET['paginacaoNumero'] <= $total_pages){               
                $page  = $_GET['paginacaoNumero'];
            } else{
                $page = 1;
            }

            $skip = ($page -1) * 5;
            $posts = App::get('database')->selectSearch('posts', $_GET['busca'], $skip, 5, 'title');
            return view('site/lista-de-posts', compact('posts', 'page', 'total_pages', 'search'));
        }

        $search = '';

        $total_itens = App::get('database')->count('posts');

        $total_pages = ceil($total_itens/5);

        if(isset($_GET['paginacaoNumero']) 
        && $_GET['paginacaoNumero'] >= 1 && $_GET['paginacaoNumero'] <= $total_pages){               
            $page  = $_GET['paginacaoNumero'];
        } else{
            $page = 1;
        }

        $skip = ($page -1) * 5;        

        $posts = App::get('database')->selectAll('posts', $skip, 5);

        

        return view('site/lista-de-posts', compact('posts', 'page', 'total_pages', 'search'));
    }
}