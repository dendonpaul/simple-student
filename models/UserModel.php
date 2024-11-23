<?php

require_once('./core/Database.php');

class UserModel
{
    private $db;

    private function _construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllUsers()
    {
        $sql = "SELECT * from Students";
        $stmt = $this->db->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }
}
