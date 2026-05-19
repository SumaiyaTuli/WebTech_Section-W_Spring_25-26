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

    $name = test_input($_POST['name']);

    $email = test_input($_POST['email']);

    $password = test_input($_POST['password']);

    $errors = false;

    if(empty($name)){

        $_SESSION['name_error'] = "Name Required";

        $errors = true;
    }

    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){

        $_SESSION['email_error'] = "Valid Email Required";

        $errors = true;
    }

    if(empty($password) || strlen($password) < 8){

        $_SESSION['password_error'] = "Password Must Be At Least 8 Characters";

        $errors = true;
    }

    if($errors){

        header("Location: ../views/signup.php");

        exit();
    }

    if($model->userExists($email) > 0){

        $_SESSION['email_error'] = "Email Already Exists";

        header("Location: ../views/signup.php");

        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $model->createUser($name, $email, $hashed_password);

    header("Location: ../views/login.php");
}

?>