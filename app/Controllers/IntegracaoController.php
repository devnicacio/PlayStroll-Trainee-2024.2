<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class Controller{
    //Site
    public function getIndex(){
        return view('site/index');
    }

    
    //Post Individual

    public function exbibirPostIndividual()
    {
        return view('site/post-individual');
    }

}
?>