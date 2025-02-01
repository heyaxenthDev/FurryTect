<?php
header('Content-Type: application/json');

// Database connection
include "includes/conn.php";

// Get and validate inputs
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$incidentId = filter_input(INPUT_GET, 'fileId', FILTER_SANITIZE_STRING);
$path = "\FurryTect/"; // Use correct path formatting

if ($id && $incidentId) {

    // Fetch incident details
    $sql = "SELECT * FROM `incidentreports` WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $reportInfo = $stmt->get_result()->fetch_assoc() ?? [];


    // Fetch evidence files
    $query = "SELECT `file_path` FROM `evidencefiles` WHERE `incident_id` = ?";
    $stmtEvidence = $conn->prepare($query);
    $stmtEvidence->bind_param("s", $incidentId);
    $stmtEvidence->execute();
    $resultEvidence = $stmtEvidence->get_result();

    $attachments = [];
    while ($row = $resultEvidence->fetch_assoc()) {
        $attachments[] = $path. $row['file_path'];
    }

    $response = array_merge($reportInfo, ['attachments' => $attachments]);


    echo json_encode($response);


    // Close statements
    $stmt->close();
    $stmtEvidence->close();
} else {
    echo json_encode(['error' => 'Invalid record number']);
}

$conn->close();
?>