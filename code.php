<?php
session_start();
require_once 'includes/conn.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insertIncidentReport'])) {
    $incidentType = $_POST['incidentType'];
    $dateTime = $_POST['dateTime'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $agreeTerms = isset($_POST['agree']) ? 1 : 0;
    $uploadDir = 'uploads/';
    $evidenceFiles = [];

    // Handle file uploads
    if (!empty($_FILES['uploadEvidence']['name'][0])) {
        foreach ($_FILES['uploadEvidence']['name'] as $key => $filename) {
            $fileTmp = $_FILES['uploadEvidence']['tmp_name'][$key];
            $filePath = $uploadDir . basename($filename);

            // Move the file to the upload directory
            if (move_uploaded_file($fileTmp, $filePath)) {
                $evidenceFiles[] = $filePath;
            }
        }
    }

    // Convert evidence files to JSON
    $evidenceFilesJson = json_encode($evidenceFiles);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO incidentreports (incident_type, date_time, location, description, evidence_files, agree_terms) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $incidentType, $dateTime, $location, $description, $evidenceFilesJson, $agreeTerms);

    if ($stmt->execute()) {
        // echo "Incident report submitted successfully!";
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Incident report submitted successfully!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Error: " . $stmt->error;
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    $stmt->close();
}
?>