<?php
    $name = "root";
    $pass = "minhduy123";
    $server_name = "127.0.0.1";
    $database_name = "project";

    $con = mysqli_connect($server_name,$name,$pass,$database_name) or die("connection failed".mysqli_connect_error());
?>