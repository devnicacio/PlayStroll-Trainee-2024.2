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

    public function selectAll($table)
    {
        $sql = "select * from {$table}";

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

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update($table, $id, $parameters, $image, $fotoAtual)
    {
        if(isset($image)){
            unlink($fotoAtual);
            $pasta = "uploads/";
            $extensao = pathinfo($image['name'], PATHINFO_EXTENSION);
            $nomeimg = uniqid() . '.' . $extensao;
            $caminhoimg = $pasta . basename($nomeimg);
            move_uploaded_file($image['tmp_name'], $caminhoimg);
            $parameters['image'] = $caminhoimg;
        }

        $sql = sprintf('UPDATE %s SET %s WHERE id = %s', 
            $table, 
            implode(', ', array_map(function($param) {
                return $param . ' = :' . $param;
            }, array_keys($parameters))),

            $id
        );

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

}