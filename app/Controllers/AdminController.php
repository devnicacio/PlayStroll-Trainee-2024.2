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

        

        $users = App::get('database')->selectAllUsers('users', $inicio, $itensPage, null);

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

    // Chama a função para deletar os posts do usuário
    $this->deletaPostsPorUsuario($id);

    unlink($image);
    App::get('database')->delete('users', $id);

    header('Location: /users');
}

public function deletaPostsPorUsuario($userId)
{
    // Busca os posts associados ao usuário
    $posts = App::get("database")->select('posts', ['user_id' => $userId]);

    // Para cada post encontrado, exclui as imagens (capa e retrato)
    foreach ($posts as $post) {
        if (file_exists($post['capa'])) {
            unlink($post['capa']);
        }
        if (file_exists($post['retrato'])) {
            unlink($post['retrato']);
        }
    }

    // Deleta os posts do usuário
    App::get("database")->delete('posts', ['user_id' => $userId]);
}




}
?>