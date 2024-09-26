<?php

// Start a session to track login status
session_start();
include 'connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get and sanitize the input data
    $input_username = htmlspecialchars(trim($_POST['username']));
    $input_password = htmlspecialchars(trim($_POST['password']));

    // Prepare and execute a SQL statement to check if the user exists
    $sql = "SELECT * FROM account WHERE account_username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $input_username); // "s" means the parameter is a string
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        // Fetch the user data
        $user = $result->fetch_assoc();
        
        // Verify the password (assuming it's hashed in the database)
        if ($input_password === $user['account_password']) {
            // Success! Set the session and redirect to a secure page
            $_SESSION['account_id'] = $user['account_id'];
            
            header("Location: dashboard.php"); // Redirect to the dashboard
            exit;
        } else {
            // Invalid password: show alert and redirect back to the index
            echo "<script>alert('Invalid password. Please try again.');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
            exit;
        }
    } else {
        // Invalid username
        echo "No user found with that username!";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method!";
}
?>
