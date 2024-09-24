<?php
// Start the session
session_start();
include 'connection.php';
// Unset all of the session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: index.php");
exit;

