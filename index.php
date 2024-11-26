<?php

//check if logged in by verifying cookies or sessions
$loggedIn = false;

session_start();
if (isset($_SESSION['id'])) {
    $loggedIn = true;
} else {
    echo "No session";
}

if (!$loggedIn) {
    //load LoginController
    require_once "controllers/LoginController.php";
    $loginController = new LoginController();

    //login register post data
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        //Register POST Data
        if (isset($_GET['action']) && $_GET['action'] == 'register') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $loginController->loginRegister($username, $email, $password);
        }

        //Login POST data
        if (isset($_GET['action']) && $_GET['action'] == 'login') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $loginController->loginUser($username, $password);
        }
    }

    //Display login form
    $loginController->showForm();
} else {
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
}
