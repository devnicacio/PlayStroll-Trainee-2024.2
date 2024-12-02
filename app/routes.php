<?php

namespace App\Controllers;
use App\Controllers\LoginController;
use App\Core\Router;
use App\Controllers\ExampleController;
use App\Controllers\AdminController;
use App\Controllers\Controller;
use App\Controllers\IntegracaoController;

    //Login
    $router->get('login', 'LoginController@exibirLogin');
    $router->get('dashboard', 'LoginController@exibirDashboard');
    $router->post('login', 'LoginController@executaLogin');
    $router->post('logout', 'LoginController@executaLogout');

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

    //Lista de posts e Post individual
    $router->get('lista-de-posts', 'IntegracaoController@exibirListaDePosts');
    $router->get('post-individual', 'IntegracaoController@exbibirPostIndividual');

?>