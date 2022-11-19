<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database_name = "business_service";

    $db = mysqli_connect($host, $username, $password);
    if (!$db) {
        exit("Cannot connect to $host using $username!");
    } else {
        mysqli_select_db($db, $database_name);
    }
?>