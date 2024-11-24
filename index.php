<?php

require_once 'controllers/UserController.php';

$controller = new UserController();

//Check post request to delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['actionB']) && $_POST['actionB'] == 'delete') {
        $id = $_POST['id'];
        $controller->deleteUser($id);
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
