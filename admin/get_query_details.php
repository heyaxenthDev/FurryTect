<?php
include 'includes/conn.php';
session_start(); // Ensure session is started to access $_SESSION['username']

function logActivity($conn, $username, $desc) {
    $sql = "INSERT INTO log_history (username, description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $desc);
    $stmt->execute();
    $stmt->close();
}

if (isset($_GET['id'])) {
    $queryId = intval($_GET['id']);

    // Fetch query details
    $sql = "SELECT name, email, subject, message FROM contact_messages WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $queryId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $queryDetails = $result->fetch_assoc();

        // Update the status to '0' (read)
        $updateSql = "UPDATE contact_messages SET status = 0 WHERE id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("i", $queryId);
        $updateStmt->execute();
        $updateStmt->close();

        // Log activity
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $description = "Viewed an email query and marked it as read. Query ID: $queryId";
            logActivity($conn, $username, $description);
        }

        // Return the query details as JSON
        echo json_encode($queryDetails);
    } else {
        echo json_encode(['error' => 'No query found']);
    }

    $stmt->close();
}
$conn->close();
?>