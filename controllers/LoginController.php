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
        // $model = new LoginModel();
        $this->model->loginRegister($username, $email, $password);
    }

    //Login Function
    public function loginUser($username, $password)
    {
        $result = $this->model->loginUser($username, $password);

        if ($result['password'] && $result['password'] === $password) {
            session_start();
            $_SESSION['username'] = $result['id'];
        }
    }
}
