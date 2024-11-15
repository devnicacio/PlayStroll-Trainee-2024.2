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

    public function selectAll($table): mixed
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
    public function insert(string $table, array $parameters): mixed{
        $sql = sprintf("INSERT INTO %t VALUES (%p);", 
        $table,
        implode(", ", 
        array_map(
            function($param){return $param. " = " . $param;},
            array_keys($parameters)
        )));

        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);          
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function inserePost($table, $parameters, $img1, $img2){
        $pasta = "uploads/";

        $novoNome1=uniqid();
        $caminho1 = $pasta . basename($novoNome1);
        move_uploaded_file($img1["tmp_name"], $caminho1);
        $parameters['image-capa'] = $caminho1;

        $novoNome2=uniqid();
        $caminho2 = $pasta . basename($novoNome2);
        move_uploaded_file($img2["tmp_name"], $caminho2);
        $parameters['image-retrato'] = $caminho2;

        $sql = sprintf('INSERT INTO %s (%s) VALUES (:%s)',
        $table,
        implode(', ', array_keys($parameters)),
        implode(', :', array_keys($parameters))
        );
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}