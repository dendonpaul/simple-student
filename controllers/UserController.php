<?php

require_once 'models/UserModel.php';

class UserController
{
    public function index()
    {
        $model = new UserModel();
        $users = $model->getAllUsers();

        require 'views/user_view.php';
    }
}
