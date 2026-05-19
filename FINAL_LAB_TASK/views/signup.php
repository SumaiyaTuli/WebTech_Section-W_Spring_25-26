<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

    <title>Sign Up</title>

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

<h2>Sign Up</h2>

<form action="../controllers/signupController.php" method="POST">

    <label>Name</label><br>

    <input type="text" name="name"><br>

    <span class="error">
    <?php
    if(isset($_SESSION['name_error'])){

        echo $_SESSION['name_error'];

        unset($_SESSION['name_error']);
    }
    ?>
    </span>

    <label>Email</label><br>

    <input type="email" name="email"><br>

    <span class="error">
    <?php
    if(isset($_SESSION['email_error'])){

        echo $_SESSION['email_error'];

        unset($_SESSION['email_error']);
    }
    ?>
    </span>

    <label>Password</label><br>

    <input type="password" name="password"><br>

    <span class="error">
    <?php
    if(isset($_SESSION['password_error'])){

        echo $_SESSION['password_error'];

        unset($_SESSION['password_error']);
    }
    ?>
    </span>

    <br>

    <button type="submit">Sign Up</button>

</form>

<br>

<a href="login.php">Already have an account? Login</a>

</div>

</body>
</html>