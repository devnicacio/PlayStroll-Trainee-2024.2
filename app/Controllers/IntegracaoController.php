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
        $posts = App::get('database')->select('posts', $_GET['busca']);
        return view('site/lista-de-posts', compact('posts'));
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