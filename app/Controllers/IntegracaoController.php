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

        $posts = App::get('database')->selectAllSearch('posts', $skip, 5);

        

        return view('site/lista-de-posts', compact('posts', 'page', 'total_pages', 'search'));
    }


    //Post Individual

    public function exibirPostIndividual(){
        $id = $_GET['id'];
        $post = App::get('database')->selecionaPost('posts', $id);
        return view('site/post-individual', compact('post'));
    }

    //Landing Page
    public function paginaInicial(){
        $posts = App::get('database')->selecionaAleatorio('posts');
        $postsfive = App::get('database')->selecionaCinco('posts');
        return view('site/landing-page', compact('posts', 'postsfive'));
    }
    
}
?>