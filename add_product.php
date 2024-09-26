<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['account_id'])) {
    header("Location: index.php");
    exit;
}

// Database connection
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "tcc_project"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prod_name = $_POST['prod_name'];
    $prod_description = $_POST['prod_description'];
    $prod_status = $_POST['prod_status'];
    $prod_quan = $_POST['prod_quan'];

    // Insert query
    $sql = "INSERT INTO product (prod_name, prod_description, prod_status, prod_quan) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $prod_name, $prod_description, $prod_status, $prod_quan);

    if ($stmt->execute()) {
        echo "Product added successfully.";
    } else {
        echo "Error adding product: " . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>
