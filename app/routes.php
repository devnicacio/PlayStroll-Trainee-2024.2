<?php

namespace App\Controllers;
use App\Controllers\loginController;
use App\Core\Router;

    $router->get('login', 'loginController@exibirLogin');
    $router->get('dashboard', 'loginController@exibirDashboard');
    $router->post('login', 'loginController@executaLogin');

?>