<?php

namespace App\Controllers;
use App\Controllers\Controller;
use App\Core\Router;

    $router->get('', 'Controller@getIndex');

    //Admin
    $router->get('admin/tabela-de-posts', 'Controller@getTabelaDePosts');
?>