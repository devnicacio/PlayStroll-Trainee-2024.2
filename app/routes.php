<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Controllers\AdminController;
use App\Controllers\Controller;
use App\Core\Router;

    //Users
    $router->get('users', 'AdminController@index');
    $router->post('users/create', 'AdminController@createUsers');
    $router->post('users/edit', 'AdminController@edit');
    $router->post('users/delete', 'AdminController@delete');
    $router->get('', 'Controller@getIndex');

    //Admin
    $router->get('admin/tabela-de-posts', 'Controller@getTabelaDePosts');
    $router->post('admin/tabela-de-posts/update-post', 'Controller@updatePost');
    $router->post('criar-post', 'Controller@create');
    $router->post('deletar-post', 'Controller@delete_post');

?>