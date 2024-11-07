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
        return view('admin/tabela-de-posts');
    }
    
}
?>