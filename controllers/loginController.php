<?php

session_start();

include_once("../models/UserModel.php");

$model = new UserModel();

function test_input($data){

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = test_input($_POST['email']);

    $password = test_input($_POST['password']);

    $user = $model->getUser($email);

    if($user){

        if(password_verify($password, $user['password'])){

            $_SESSION['user_id'] = $user['id'];

            $_SESSION['name'] = $user['name'];

            header("Location: ../views/dashboard.php");

            exit();

        } else {

            $_SESSION['login_error'] = "Invalid Password";

            header("Location: ../views/login.php");

            exit();
        }

    } else {

        $_SESSION['login_error'] = "Email Not Found";

        header("Location: ../views/login.php");

        exit();
    }
}

?>