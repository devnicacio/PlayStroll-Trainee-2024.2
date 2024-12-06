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
        if(isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])){
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0){
                return redirect('lista-de-posts');
            }
        }

        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        if($_GET['busca']){
            $rows_count = App::get('database')->countSearch('posts', $_GET['busca']);
        } else{
            $rows_count = App::get('database')->countAllPosts('posts');
        }


        

        $posts = App::get('database')->selectAll('posts', $inicio, $itensPage, $_GET['busca']);

        $total_pages = ceil($rows_count/$itensPage);

        

        return view('site/lista-de-posts', compact('posts', 'page', 'total_pages'));
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