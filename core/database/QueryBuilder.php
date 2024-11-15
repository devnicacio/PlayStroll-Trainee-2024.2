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
}