<?php

namespace App\Controllers;
use App\Controllers\LoginController;
use App\Core\Router;

    $router->get('login', 'LoginController@exibirLogin');
    $router->get('dashboard', 'LoginController@exibirDashboard');
    $router->post('login', 'LoginController@executaLogin');

?>