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
        // $sql = "SELECT * from LoginDetails where email = :email OR username = :username ";
        $sql1 = "SELECT * from LoginDetails where email = :email";
        $sql2 = "SELECT * from LoginDetails where username = :username";
        $stmt = $this->db->prepare($sql1);
        $stmt2 = $this->db->prepare($sql2);
        $stmt->execute(['email' => $email]);
        $stmt2->execute(['username' => $username]);
        $row =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        $row2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        if ($row && $row2) {
            return "Email and Username exists";
        } else if ($row) {
            return "Email Exists";
        } else if ($row2) {
            return "Username Exists";
        } else {
            return true;
        }
    }
}
