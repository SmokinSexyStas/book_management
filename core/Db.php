<?php

namespace core;

class Db{
    private static $instance = null;
    private $pdo;

    private function __construct() {
        try{
            $this->pdo = new \PDO("mysql:host=db;dbname=book_management_system", 'root', 'root');
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public static function getInstance(){
        if (self::$instance === null) {
            self::$instance = new Db();
        }
        return self::$instance->pdo;
    }
}