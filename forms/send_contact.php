<?php
session_start();
// Database connection

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "furrytect_db";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sendQuery'])) {
    // Retrieve form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // Prepare SQL query to insert data
    $sql = "INSERT INTO contact_messages (name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Message sent successfully!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Ok";
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Failed to send message!";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Retry";
    }
}
header("Location: {$_SERVER['HTTP_REFERER']}");
// Close the connection
$conn->close();
?>