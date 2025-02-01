<?php
session_start(); // Start the session to store feedback messages

include 'includes/conn.php'; // Database connection

// Check if form is submitted and data is valid
if (isset($_POST['saveEditChangesBtn']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect POST data
    $id = $_POST['id']; // Assuming 'id' is being passed with the form submission
    $species = $_POST['species'];
    $vaccination_reason = $_POST['vaccination_reason'];
    $vaccination_status = $_POST['vaccination_status'];
    $vaccination_disease = $_POST['vaccination_disease'];
    $vaccine_type = $_POST['vaccine_type'];
    $vacc_source = $_POST['vacc_source'];

    // Prepare SQL query to update the record
    $sql = "UPDATE {$species}s 
            SET vacc_reason = ?, vacc_status = ?, vacc_disease = ?, vacc_type = ?, vacc_source = ? 
            WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Bind parameters for the prepared statement
        $stmt->bind_param(
            "sssssi", 
            $vaccination_reason, $vaccination_status, 
            $vaccination_disease, $vaccine_type, 
            $vacc_source, $id
        );

        // Execute the query
        if ($stmt->execute()) {
            // Set session variables for success
            $_SESSION['status'] = "Success";
            $_SESSION['status_text'] = "Vaccination record updated successfully!";
            $_SESSION['status_code'] = "success";
            $_SESSION['status_btn'] = "Done";

            // Redirect to the previous page or another page after success
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } else {
            // Set session variables for error
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Failed to update vaccination record.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Retry";

            // Redirect to the previous page or another page after error
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        }

        $stmt->close();
    } else {
        // Set session variables for database error
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Database error occurred.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Retry";

        // Redirect to the previous page or another page after error
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
    }
} else {
    // Invalid request
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}

$conn->close();
?>