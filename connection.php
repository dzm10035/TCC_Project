<?php
    $servername = "localhost";
    $username = "root"; 
    $password = "dzmshabi";     
    $dbname = "tcc_project"; 

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>