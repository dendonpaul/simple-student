<?php

require_once 'controllers/UserController.php';

$controller = new UserController();

//Check post request to delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['actionB']) && $_POST['actionB'] == 'delete') {
        $id = $_POST['id'];
        $controller->deleteUser($id);
    }

    //Check if update request
    if (isset($_POST['actionB']) && $_POST['actionB'] == 'update') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $grade = $_POST['grade'];

        $controller->updateUser($id, $name, $age, $grade);
    }
    //Check post details and add new student
    if (isset($_POST['add'])) {
        $name = isset($_POST['name']) ? $_POST['name'] : "";
        $grade = isset($_POST['grade']) ? $_POST['grade'] : "";
        $age = isset($_POST['age']) ? $_POST['age'] : "";

        $controller->addUser($name, $age, $grade);
    }
} else {
    $controller->index();
}
