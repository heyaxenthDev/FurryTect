<?php 
session_start();
include 'includes/conn.php';

// Function to generate a unique owner code
function generateOwnerCode($conn)
{
    $randomNumber = rand(10000, 99999);
    $result = $conn->query("SHOW TABLE STATUS LIKE 'owners'");
    $row = $result->fetch_assoc();
    $nextAutoIncrement = $row['Auto_increment'];
    return $randomNumber . "-" . $nextAutoIncrement;
}

if (isset($_GET['id']) && !isset($_GET['confirmation'])) {

    $id = $_GET['id'];

    // Prepare and execute query to check if owner exists and is not yet confirmed
    $sql = "SELECT * FROM owners WHERE id = ? AND admin_confirm = '0'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Generate owner code
        $ownerCode = generateOwnerCode($conn);

        // Update database with the owner code and confirm the account
        $update = "UPDATE owners SET owner_code = ?, admin_confirm = ? WHERE id = ?";
        $updateStmt = $conn->prepare($update);
        $admin_confirm = 1; // Confirm the account
        $updateStmt->bind_param('sii', $ownerCode, $admin_confirm, $id);

        if ($updateStmt->execute()) {
            // Success message
            $_SESSION['status'] = "Success";
            $_SESSION['status_text'] = "Account Confirmed!";
            $_SESSION['status_code'] = "success";
            $_SESSION['status_btn'] = "Ok";

            $username = $_SESSION["username"];

            logActivity($conn, $username, "Confirmed Owner Account");

            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        } else {
            // Error message
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Error: " . $conn->error;
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }

        $updateStmt->close();
    }
    $stmt->close();
}

function logActivity($conn, $username, $desc){
    $sql = "INSERT INTO log_history (username, description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $desc);
    $stmt->execute();
    $stmt->close();

}

if (isset($_GET['id']) && isset($_GET['confirmation'])) {
   
    $id = $_GET['id'];
    $get_conf = $_GET['confirmation'];

    // Prepare and execute query to check if owner exists and is not yet confirmed
    $sql = "SELECT * FROM owners WHERE id = ? AND admin_confirm = '0'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Update database with the owner code and confirm the account
        $update = "UPDATE owners SET admin_confirm = ? WHERE id = ?";
        $updateStmt = $conn->prepare($update);
        $admin_confirm = $get_conf; // Confirm the account
        $updateStmt->bind_param('ii', $admin_confirm, $id);

        if ($updateStmt->execute()) {
            // Success message
            $_SESSION['status'] = "Warning";
            $_SESSION['status_text'] = "Account Declined!";
            $_SESSION['status_code'] = "warning";
            $_SESSION['status_btn'] = "Ok";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        } else {
            // Error message
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Error: " . $conn->error;
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }

        $updateStmt->close();
    }
    $stmt->close();
}
?>