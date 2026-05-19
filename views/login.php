<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

    <title>Login</title>

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

<h2>Login</h2>

<form action="../controllers/loginController.php" method="POST">

    <label>Email</label><br>

    <input type="email" name="email"><br>

    <label>Password</label><br>

    <input type="password" name="password"><br>

    <span class="error">
    <?php
    if(isset($_SESSION['login_error'])){

        echo $_SESSION['login_error'];

        unset($_SESSION['login_error']);
    }
    ?>
    </span>

    <br>

    <button type="submit">Login</button>

</form>

<br>

<a href="signup.php">Create New Account</a>

</div>

</body>
</html>