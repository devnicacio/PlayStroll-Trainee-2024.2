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

    public function selectAll($table, $inicio = null, $rows_count = null)
    {
        $sql = "SELECT * FROM {$table}";

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

    public function select($table): mixed
    {
        $sql = "SELECT * FROM {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

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

    public function updatePost($table, $parameters, $img1, $img2):void{
        $pasta = "uploads/";
        if(isset($parameters["image_capa"])){
            $extensao1 = pathinfo($img1['name'], PATHINFO_EXTENSION);
            $novoNome1 = uniqid() . '.' . $extensao1;
            $caminho1 = $pasta . basename($novoNome1);
            move_uploaded_file($img1["tmp_name"], $caminho1);
            $parameters['image_capa'] = $caminho1; 
        }
        if(isset($parameters["image_retrato"])){
            $extensao2 = pathinfo($img2['name'], PATHINFO_EXTENSION);
            $novoNome2 = uniqid() . '.' . $extensao2;
            $caminho2 = $pasta . basename($novoNome2);
            move_uploaded_file($img2["tmp_name"], $caminho2);
            $parameters['image_retrato'] = $caminho2;
        }
        $sql = sprintf('UPDATE FROM %t VALUES(%v) WHERE %i',
        $table,
        implode(string: ',', array: array_keys($parameters)),
        ':' . implode(', :', array_keys($parameters)),
    )

    }

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