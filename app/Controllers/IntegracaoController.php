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

    public function exibirPostIndividual(){
        $post = App::get('database')->selecionaPost('posts');
        return view('site/post-individual', ['post' => $post]);
    }

    
    
}
?>