<?php

include_once("../config/Database.php");

class UserModel {

    private $conn;

    public function __construct(){

        $db = new Database();

        $this->conn = $db->OpenCon();
    }

    public function userExists($email){

        $query = "SELECT * FROM users WHERE email='$email'";

        $result = mysqli_query($this->conn, $query);

        return mysqli_num_rows($result);
    }

    public function createUser($name, $email, $password){

        $query = "INSERT INTO users(name,email,password)
                  VALUES('$name','$email','$password')";

        return mysqli_query($this->conn, $query);
    }

    public function getUser($email){

        $query = "SELECT * FROM users WHERE email='$email'";

        $result = mysqli_query($this->conn, $query);

        return mysqli_fetch_assoc($result);
    }
}

?>