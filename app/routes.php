<?php

namespace App\Controllers;
use App\Controllers\Controller;
use App\Core\Router;

    $router->get('', 'Controller@getIndex');

    //Admin
    $router->get('admin/tabela-de-posts', 'Controller@getTabelaDePosts');
    $router->post('admin/tabela-de-posts/post-post', 'Controller@postPost');
    $router->post('admin/tabela-de-posts/put-post', 'Controller@putPost');
    $router->post('criar-post', 'Controller@create');
    $router->post('deletar-post', 'Controller@delete_post');
?>