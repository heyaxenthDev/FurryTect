<?php
session_start();
require_once('includes/conn.php');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $_SESSION['status'] = "Error";
    $_SESSION['status_text'] = "No data to save.";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_btn'] = "Back";
    header("Location: ./dashboard");
    $conn->close();
    exit;
}

extract($_POST);
$allday = isset($allday);

if (empty($id)) {
    $sql = "INSERT INTO `schedule_list` (`title`,`description`,`start_datetime`,`end_datetime`) VALUES ('$title','$description','$start_datetime','$end_datetime')";
} else {
    $sql = "UPDATE `schedule_list` SET `title` = '{$title}', `description` = '{$description}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}' WHERE `id` = '{$id}'";
}

$save = $conn->query($sql);

if ($save) {
    $_SESSION['status'] = "Success";
    $_SESSION['status_text'] = "Schedule successfully saved.";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_btn'] = "Done";

    logActivity($conn, $_SESSION['username'], 'Saved a schedule');
} else {
    $_SESSION['status'] = "Error";
    $_SESSION['status_text'] = "An error occurred: " . $conn->error;
    $_SESSION['status_code'] = "error";
    $_SESSION['status_btn'] = "Back";
}

function logActivity($conn, $username, $desc){
    $sql = "INSERT INTO log_history (username, description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $desc);
    $stmt->execute();
    $stmt->close();

}

$conn->close();

header("Location: ./dashboard");
exit();
?>