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
    $prod_id = $_POST['prod_id'];

    // Delete query
    $sql = "DELETE FROM product WHERE prod_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $prod_id);

    if ($stmt->execute()) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>
