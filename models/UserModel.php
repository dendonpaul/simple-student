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

    public function deleteUser($id)
    {
        $sql = "DELETE from Students where id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    public function addUser($name, $age, $grade)
    {
        $sql = "Insert into Students (name, age, grade) values (:name, :age, :grade)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':name' => $name, ':age' => $age, ':grade' => $grade]);
    }
}
