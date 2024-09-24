<?php
    $servername = "localhost";
    $username = "root"; 
    $password = "";     
    $dbname = "tcc_project"; 

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>