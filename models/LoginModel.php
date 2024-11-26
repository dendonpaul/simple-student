<?php

require_once 'core/Database.php';

class LoginModel
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function loginRegister($username, $email, $password)
    {
        $sql = "INSERT into LoginDetails (username, email, password) VALUES (:username,:email,:password)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':username' => $username, ':email' => $email, ':password' => $password]);
    }
}
