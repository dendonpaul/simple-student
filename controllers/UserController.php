<?php

require_once 'models/UserModel.php';

class UserController
{
    public function index()
    {
        $model = new UserModel();
        $users = $model->getAllUsers();
        require 'views/user_view.php';


        //Check post request to delete
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['actionB']) && $_POST['actionB'] == 'delete') {
                $id = $_POST['id'];
                $this->deleteUser($id);
            }
            //Check post details and add new student
            if (isset($_POST['add'])) {
                $name = isset($_POST['name']) ? $_POST['name'] : "";
                $grade = isset($_POST['grade']) ? $_POST['grade'] : "";
                $age = isset($_POST['age']) ? $_POST['age'] : "";

                $this->addUser($name, $age, $grade);
            }
        }
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
}
