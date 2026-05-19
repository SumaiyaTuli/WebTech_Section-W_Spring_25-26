<?php

class Database {

    public function OpenCon() {

        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "final_lab_task";

        $conn = mysqli_connect($host, $user, $pass, $db);

        if(!$conn){

            die("Database Connection Failed");
        }

        return $conn;
    }
}

?>