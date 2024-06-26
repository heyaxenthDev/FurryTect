<?php
session_start();
require_once('includes/conn.php');

if (!isset($_GET['id'])) {
    $_SESSION['status'] = "Error";
    $_SESSION['status_text'] = "Undefined Schedule ID.";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_btn'] = "Back";
    header("Location: ./dashboard");
    $conn->close();
    exit;
}

$id = $_GET['id'];

// Prepare the statement to prevent SQL injection
$stmt = $conn->prepare("DELETE FROM `schedule_list` WHERE id = ?");
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    $_SESSION['status'] = "Success";
    $_SESSION['status_text'] = "Event has been deleted successfully.";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_btn'] = "Done";
} else {
    $_SESSION['status'] = "Error";
    $_SESSION['status_text'] = "An error occurred: " . $stmt->error;
    $_SESSION['status_code'] = "error";
    $_SESSION['status_btn'] = "Back";
}

$stmt->close();
$conn->close();

header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
?>