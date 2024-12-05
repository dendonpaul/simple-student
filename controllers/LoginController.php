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
        if (!empty($this->loginDuplicate($username, $email))) {
            echo "User Already exists";
            return false;
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $this->model->loginRegister($username, $email, $password);
        }
    }

    //Login Function
    public function loginUser($username, $password)
    {
        $result = $this->model->loginUser($username, $password);
        if (isset($result[0]['password']) && password_verify($password, $result[0]['password'])) {
            $_SESSION['id'] = $result[0]['id'];

            header("Location: ./index.php");
        }
    }

    //Check duplicate user
    public function loginDuplicate($username, $email)
    {
        return $this->model->loginDuplicate($username, $email);
    }
}
