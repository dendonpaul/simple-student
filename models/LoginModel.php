<?php

require_once 'core/Database.php';

class LoginModel
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    //Register User Model function
    public function loginRegister($username, $email, $password)
    {
        $sql = "INSERT into LoginDetails (username, email, password) VALUES (:username,:email,:password)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':username' => $username, ':email' => $email, ':password' => $password]);
    }

    //Login user Model function
    public function loginUser($username, $password)
    {
        $sql = "SELECT * FROM LoginDetails WHERE username=:username";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['username' => $username]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Check duplicate username and email
    public function loginDuplicate($username, $email)
    {
        $sql = "Select * from LoginDetails where email = :email OR username = :username";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['email' => $email, 'username' => $username]);
    }
}
