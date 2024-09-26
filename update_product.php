<?php
// Start session to check if the user is logged in
session_start();
include 'connection.php';
// Check if the user is logged in
if (!isset($_SESSION['account_id'])) {
    echo "You are not authorized to perform this action.";
    exit;
}

// Handle AJAX request to update the product
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prod_id = intval($_POST['prod_id']);
    $prod_name = $_POST['prod_name'];
    $prod_description = $_POST['prod_description'];
    $prod_status = $_POST['prod_status'];
    $prod_quan = intval($_POST['prod_quan']);

    // Validate input (simple validation)
    if (empty($prod_name) || empty($prod_description) || empty($prod_status) || $prod_quan < 0) {
        echo "Please fill in all fields correctly.";
    } else {
        // Update the product in the database
        $stmt = $conn->prepare("UPDATE product SET prod_name = ?, prod_description = ?, prod_status = ?, prod_quan = ? WHERE prod_id = ?");
        $stmt->bind_param("sssii", $prod_name, $prod_description, $prod_status, $prod_quan, $prod_id);

        if ($stmt->execute()) {
            echo "Product updated successfully.";
        } else {
            echo "Error updating product: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>
