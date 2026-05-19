<?php

session_start();

if(!isset($_SESSION['user_id'])){

    header("Location: login.php");

    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Dashboard</title>

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

<h2>Welcome <?php echo $_SESSION['name']; ?></h2>

<p>You are successfully logged in.</p>

<button onclick="window.location.href='../controllers/logout.php'">

    Logout

</button>

</div>

</body>
</html>