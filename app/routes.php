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
    $router->get('admin/tabela-de-posts', 'paginacaoPostsController@index');

    //Lista de posts Post individual
    $router->get('lista-de-posts', 'IntegracaoController@index');
    $router->get('lista-de-posts', 'paginacaoListaPostsController@index');
    $router->get('post-individual', 'IntegracaoController@exibirPostIndividual');

    //Landing page
    $router->get('landing-page', 'IntegracaoController@paginaInicial');

    //navbar

    $router->get('navbar', 'NavbarController@index');
    $router->get('pesquisa/navbar', 'NavbarController@search');

    //footer
    $router->get('footer', 'footerController@index');

?>