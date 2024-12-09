<?php

require_once "./models/LoginModel.php";

class LoginController
{
    private $model;
    public function __construct()
    {
        $this->model = new LoginModel();
    }

    //Display Login/Register Form
    public function showForm()
    {
        require "./views/login_form.php";
    }

    //Register Function
    public function loginRegister($username, $email, $password)
    {

        //check if username and email exists
        $userExists = $this->loginDuplicate($username, $email);
        if (is_string($userExists)) {
            echo $userExists;
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $this->model->loginRegister($username, $email, $password);
        }
    }

    //Login Function
    public function loginUser($username, $password)
    {
        //check if user is locked out
        $isLockedOut = $this->isLockedOut($username);
        if (is_string($isLockedOut)) {
            echo $isLockedOut;
            return;
        }

        $result = $this->model->loginUser($username, $password);
        if (isset($result[0]['password']) && password_verify($password, $result[0]['password'])) {
            $_SESSION['id'] = $result[0]['id'];

            header("Location: ./index.php");
        } else {
            $this->recordErrorLogin($username);
        }
    }

    //Check duplicate user
    public function loginDuplicate($username, $email)
    {
        return $this->model->loginDuplicate($username, $email);
    }

    //Rate Limit 5 attempts within 15minutes
    public function isLockedOut($username)
    {
        return $this->model->isLockedOut($username, 5, 15 * 60);
    }

    //Register Failed login
    public function recordErrorLogin($username)
    {
        $this->model->recordErrorLogin($username);
    }
}
