<?php

require_once 'core/Database.php';

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllUsers()
    {
        $sql = "SELECT * from Students";
        $stmt = $this->db->prepare("SELECT * FROM Students");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
