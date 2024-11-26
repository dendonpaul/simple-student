<?php

require_once "./models/LoginModel.php";

class LoginController
{
    public function __construct() {}

    public function showForm()
    {
        require "./views/login_form.php";
    }
    public function loginRegister($username, $email, $password)
    {
        $model = new LoginModel();
        $model->loginRegister($username, $email, $password);
    }
}
