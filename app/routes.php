<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Controllers\AdminController;
use App\Core\Router;

    $router->get('users', 'AdminController@index');
    $router->post('users/create', 'AdminController@createUsers');
    $router->post('users/delete', 'AdminController@delete');
?>