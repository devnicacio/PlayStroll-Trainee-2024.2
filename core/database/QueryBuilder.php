<?php

namespace App\Core\Database;

use PDO, Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table, $inicio = null, $rows_count = null, $search)
    {
        
        if($search){
            $sql = "SELECT posts.*, users.name, users.image 
            FROM {$table} 
            INNER JOIN users ON users.id = posts.id_user
            WHERE title LIKE '%$search%' 
            ORDER BY posts.id DESC";
        }
        else{
            $sql = "SELECT posts.*, users.name, users.image 
            FROM {$table}
            INNER JOIN users ON users.id = posts.id_user
            ORDER BY posts.id DESC";
        }


        if($inicio >= 0 && $rows_count >0){
            $sql .= " LIMIT {$inicio}, {$rows_count}";
        }

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function selectAllUsers($table, $inicio = null, $rows_count = null, $search)
    {
        if($search){
            $sql = "SELECT * FROM {$table} WHERE title LIKE '%$search%' ORDER BY posts.id DESC";
        }else{
            $sql = "SELECT * FROM {$table}";
        }


        if($inicio >= 0 && $rows_count >0){
            $sql .= " LIMIT {$inicio}, {$rows_count}";
        }

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function select($table, $search): mixed
    {
        
        if($search){
            $sql = "SELECT * FROM {$table} WHERE title LIKE '%$search%' ORDER BY posts.id DESC";
        } else{
            $sql = sprintf(
                'SELECT %s.*, users.name, users.image 
                 FROM %s 
                 INNER JOIN users ON %s.id_user = users.id 
                 ORDER BY %s.id DESC',
                $table, $table, $table, $table
            ); 
        }

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function countSearch($table, $search){
        $sql = "SELECT  COUNT(*) from {$table} WHERE title LIKE '%$search%'";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return intval($stmt->fetch(PDO::FETCH_NUM)[0]);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verificaLogin($email, $senha){
        $sql = sprintf( 'SELECT * FROM users WHERE email = :email AND password = :password');

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'email' => $email,
                'password' => $senha
            ]);

            $user = $stmt->fetch(PDO::FETCH_OBJ);

            return $user;

        }
            catch (Exception $e) {
        die($e->getMessage());
    }
    }
    
    public function countAll($table)
    {
        $sql = "select COUNT(*) from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return intval($stmt->fetch(PDO::FETCH_NUM)[0]);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function countAllPosts($table)
    {
        $sql = "select COUNT(*) from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return intval($stmt->fetch(PDO::FETCH_NUM)[0]);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    

    public function selecionaPost($table, $id){
        $sql = sprintf(
            'SELECT %s.*, users.name, users.image 
            FROM %s
            INNER JOIN users ON posts.id_user = users.id
            WHERE %s.id = %s',
                $table, $table, $table, $id
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function selecionaAleatorio($table){
        $sql = sprintf(
            'SELECT %s.*, users.name, users.image 
             FROM %s 
             INNER JOIN users ON %s.id_user = users.id 
             ORDER BY RAND()',
            $table, $table, $table
        );   

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $posts = $stmt->fetchAll(PDO::FETCH_OBJ);

            return $posts;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function selecionaCinco($table){
        $sql = sprintf(
            'SELECT %s.*, users.name, users.image 
             FROM %s 
             INNER JOIN users ON %s.id_user = users.id 
             ORDER BY %s.id DESC LIMIT 5',
            $table, $table, $table, $table
        );   

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $posts = $stmt->fetchAll(PDO::FETCH_OBJ);

            return $posts;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function fiveposts($table){
        $sql = sprintf(
            'SELECT %s.*, users.name, users.image 
             FROM %s 
             INNER JOIN users ON %s.id_user = users.id 
             ORDER BY %s.id DESC LIMIT 5',
            $table, $table, $table, $table
        );   

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $posts = $stmt->fetchAll(PDO::FETCH_OBJ);

            return $posts;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insert($table, $parameters, $image)
    {  
        $pasta = "uploads/";
        $extensao = pathinfo($image['name'], PATHINFO_EXTENSION);
        $nomeimg = uniqid() . '.' . $extensao;
        $caminhoimg = $pasta . basename($nomeimg);
        move_uploaded_file($image['tmp_name'], $caminhoimg);
        $parameters['image'] = $caminhoimg;

        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters)),
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function inserePost($table, $parameters, $img1, $img2){
        $pasta = "uploads/";

        $extensao1 = pathinfo($img1['name'], PATHINFO_EXTENSION);
        $novoNome1=uniqid() . '.' . $extensao1;
        $caminho1 = $pasta . basename($novoNome1);
        move_uploaded_file($img1["tmp_name"], $caminho1);
        $parameters['image_capa'] = $caminho1; 

        $extensao2 = pathinfo($img2['name'], PATHINFO_EXTENSION);
        $novoNome2=uniqid() . '.' . $extensao2;
        $caminho2 = $pasta . basename($novoNome2);
        move_uploaded_file($img2["tmp_name"], $caminho2);
        $parameters['image_retrato'] = $caminho2;

        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)',
        $table,
        implode(', ', array_keys($parameters)),
        ':' . implode(', :', array_keys($parameters))
        );
        // var_dump($sql);
        // exit();
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update($table, $id, $parameters, $image, $fotoAtual)
{
    if ($image && isset($image['tmp_name']) && $image['tmp_name']) {
        // Remove a imagem antiga se existir
        if (file_exists($fotoAtual)) {
            unlink($fotoAtual);
        }

        // Processa a nova imagem
        $pasta = "uploads/";
        $extensao = pathinfo($image['name'], PATHINFO_EXTENSION);
        $nomeimg = uniqid() . '.' . $extensao;
        $caminhoimg = $pasta . basename($nomeimg);
        move_uploaded_file($image['tmp_name'], $caminhoimg);

        $parameters['image'] = $caminhoimg;
    } else {
        unset($parameters['image']); // Não altera a imagem se nenhuma for enviada
    }

    $sql = sprintf(
        'UPDATE %s SET %s WHERE id = :id',
        $table,
        implode(', ', array_map(function ($param) {
            return "$param = :$param";
        }, array_keys($parameters)))
    );

    $parameters['id'] = $id;

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
   

    public function delete($table, $id)
    {
        $sql = sprintf('DELETE FROM %s WHERE %s',
            $table,
        'id = :id');

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(compact('id'));

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // public function updatePost($table, $parameters, $img1, $img2):void
        

    public function deletaPost($table, $id){
        $sql = sprintf('DELETE FROM %s WHERE %s', $table, 'id = :id');

        try {
            $smt = $this->pdo->prepare($sql);
            $smt->execute(compact('id'));
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }
}