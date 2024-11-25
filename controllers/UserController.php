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

    public function addUser($name, $age, $grade)
    {
        $model = new UserModel();
        $model->addUser($name, $age, $grade);
        header('Location: index.php');
    }

    public function deleteUser($id)
    {
        $model = new UserModel();
        $model->deleteUser($id);
        header('Location: index.php');
    }

    public function updateUser($id, $name, $age, $grade)
    {
        $model = new UserModel();
        $model->updateUser($id, $name, $age, $grade);
        header('Location: index.php');
    }
}
