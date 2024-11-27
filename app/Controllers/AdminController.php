<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class AdminController
{

    public function index()
    {
        $page = 1;
        if(isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])){
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0){
                return redirect('admin/lista-usuarios');
            }
        }

        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('users');

        

        $users = App::get('database')->selectAll('users', $inicio, $itensPage);

        $total_pages = ceil($rows_count/$itensPage);

        if($page > $total_pages){
            header('Location: /users?paginacaoNumero=1');
            exit;
        }

        return view('admin/lista-usuarios', compact('users', 'page', 'total_pages'));
    }

    public function createUsers()
    {
        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ]; 

        App::get('database')->insert('users', $parameters, $_FILES['image']);
    

        header('Location: /users');
        
    }

    public function edit()
    {
        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];

        

        $id = $_POST['id'];

        $image = isset($_FILES['image']) && $_FILES['image']['size'] > 0 ? $_FILES['image'] : null;
        $fotoAtual = $_POST['fotoAtual'];

        App::get('database')->update('users', $id, $parameters, $image, $fotoAtual);

        header('Location: /users');
    }


    public function delete()
{
    $id = $_POST['iddelete'];
    $image = $_POST['imagedelete'];

    unlink($image);
    App::get('database')->delete('users', $id);

    header('Location: /users');
}

}
?>