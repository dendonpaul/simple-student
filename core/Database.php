<?php

class Database
{
    private static $instance = null;
    private $pdo;

    private $dsn = "mysql:host=localhost;dbname=SchoolDB";
    private $dbuser = 'denny';
    private $dbpass = 'password';

    private function _construct()
    {
        $this->pdo = new PDO($dsn, $dbuser, $dbpass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }
}
