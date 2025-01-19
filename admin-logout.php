<?php
session_start();

include_once('includes/conn.php');

// Check if user is authenticated as an admin
if (isset($_SESSION['admin_auth']) || $_SESSION['admin_auth'] == true) {
    // Set session variables for status message
    $username = $_SESSION['username'];
    $_SESSION['status_text'] = "You have been logged out.";
    $_SESSION['status_code'] = "info";

    logHistory($conn, $username, "Admin has logged out.");

     // Unset session variables
     session_destroy();

    // Redirect to index page
    header("Location: index");
    exit; // Exit script to prevent further execution
}


function logHistory($conn, $username, $desc){
    $sql = "INSERT INTO log_history (username, description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $desc);
    $stmt->execute();
    $stmt->close();

}