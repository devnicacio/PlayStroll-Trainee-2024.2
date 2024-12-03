<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class listaDePostsController{
    public function index(){
        $posts = App::get('database')->selectAll('posts');
        return view('site/lista-de-posts', compact('posts'));
    }

    public function search(){
        $posts = App::get('database')->search('posts', $_GET['busca']);

        foreach($posts as $post){
            echo $post->title  . " | ";
            
        }
    }
}