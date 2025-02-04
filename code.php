<?php
session_start();
require_once 'includes/conn.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insertIncidentReport'])) {
    $name = $_POST['yourName'];
    $email = $_POST['yourEmail'];
    $contact_number = $_POST['yourMobile'];
    $incidentType = $_POST['incidentType'];
    $dateTime = $_POST['dateTime'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $agreeTerms = isset($_POST['agree']) ? 1 : 0;
    $uploadDir = 'uploads/';
    
    // Ensure upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Generate the unique incident_id
    $dateSubmitted = date("Ymd"); // Date in YYYYMMDD format
    $randomNumber = rand(1000, 9999); // Generate random 4-digit number
    
    // Insert incident report into database (without incident_id)
    $stmt = $conn->prepare("INSERT INTO incidentreports (name, email, contact_number, incident_type, date_time, location, description, agree_terms) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssi", $name, $email, $contact_number, $incidentType, $dateTime, $location, $description, $agreeTerms);
    
    if ($stmt->execute()) {
        $incidentPrimaryKey = $stmt->insert_id; // Get the primary key for the incident
        $incidentId = $dateSubmitted . '-' . $randomNumber . '-' . $incidentPrimaryKey; // Format the incident_id
        
        // Update the incidentreport table with the generated incident_id
        $updateStmt = $conn->prepare("UPDATE incidentreports SET incident_id = ? WHERE id = ?");
        $updateStmt->bind_param("si", $incidentId, $incidentPrimaryKey);
        $updateStmt->execute();
        $updateStmt->close();
        $stmt->close();

        // Handle file uploads
        if (!empty($_FILES['uploadEvidences']['name'][0])) {
            foreach ($_FILES['uploadEvidences']['tmp_name'] as $key => $tmpName) {
                $filename = basename($_FILES['uploadEvidences']['name'][$key]);
                $fileExt = pathinfo($filename, PATHINFO_EXTENSION);
                $uniqueFilename = uniqid("evidence_", true) . "." . $fileExt;
                $filePath = $uploadDir . $uniqueFilename;

                // Validate and move uploaded file
                if (move_uploaded_file($tmpName, $filePath)) {
                    // Store each file in the evidencefiles table
                    $stmtFile = $conn->prepare("INSERT INTO evidencefiles (incident_id, file_path) VALUES (?, ?)");
                    $stmtFile->bind_param("ss", $incidentId, $filePath);
                    $stmtFile->execute();
                    $stmtFile->close();
                }
            }
        }

        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Incident report submitted successfully!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Error: " . $stmt->error;
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
    }
    
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
?>