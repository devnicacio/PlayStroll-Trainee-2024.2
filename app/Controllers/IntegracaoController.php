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
        $posts = App::get('database')->selecionaPost('posts', 'id');
        return view('site/post-individual', compact('posts'));
    }

    //Landing Page
    public function paginaInicial(){
        $posts = App::get('database')->start('posts', 'id');
        return view('site/landing-page', compact('posts'));
    }
    
}
?>