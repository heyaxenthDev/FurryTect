<?php
session_start();
include 'includes/conn.php';

function generateOwnerCode($conn)
{
    $randomNumber = rand(10000, 99999);
    $result = $conn->query("SHOW TABLE STATUS LIKE 'owners'");
    $row = $result->fetch_assoc();
    $nextAutoIncrement = $row['Auto_increment'];
    return $randomNumber . "-" . $nextAutoIncrement;
}

function handleFileUpload($file, $uploadPath)
{
    if ($file['error'] === UPLOAD_ERR_OK) {
        $filePath = $uploadPath . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            return $filePath;
        }
    }
    return null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['DogsReg'])) {

    // Handle file uploads
    $ownerPicture = handleFileUpload($_FILES['ownerImage'], 'uploads/owners/');
    $dogPicture = handleFileUpload($_FILES['dogImage'], 'uploads/dogs/');

    // Owner information
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $contactNumber = $_POST['contactNumber'];
    $ageOwner = $_POST['ageOwner'];
    $sexOwner = $_POST['sexOwner'];
    $barangay = $_POST['barangay'];

    // Generate owner code
    $ownerCode = generateOwnerCode($conn);

    // Insert owner information
    $stmt = $conn->prepare("INSERT INTO owners (owner_code, first_name, middle_name, last_name, contact_number, age, sex, barangay, owner_picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssiiss", $ownerCode, $firstName, $middleName, $lastName, $contactNumber, $ageOwner, $sexOwner, $barangay, $ownerPicture);

    if ($stmt->execute()) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Owner information added!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = $stmt->error;
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
    }

    $stmt->close();

    // Dog information
    $tagNumber = $_POST['tagNumber'] ?? null;
    $dateTagged = $_POST['dateTagged'] ?? null;
    $dogName = $_POST['name'];
    $dogSex = $_POST['sex'];
    $dogAge = $_POST['age'];
    $color = $_POST['color'];
    $vaccinationStatus = $_POST['vaccinationStatus'];
    $dateVacc = $_POST['dateVacc'] ?? null;

    // Insert dog information
    $stmt = $conn->prepare("INSERT INTO dogs (tag_number, date_tagged, name, sex, age, color, owner_code, vacc_status, date_vacc, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssississs", $tagNumber, $dateTagged, $dogName, $dogSex, $dogAge, $color, $ownerCode, $vaccinationStatus, $dateVacc, $dogPicture);

    if ($stmt->execute()) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Dog information added!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = $stmt->error;
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
    }

    $stmt->close();
    $conn->close();

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['CatsReg'])) {

    // Handle file uploads
    $ownerPicture = handleFileUpload($_FILES['catOwnerImage'], 'uploads/owners/');
    $catPicture = handleFileUpload($_FILES['catImage'], 'uploads/cats/');

    // Owner information
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $contactNumber = $_POST['contactNumber'];
    $ageOwner = $_POST['ageOwner'];
    $sexOwner = $_POST['sexOwner'];
    $barangay = $_POST['barangay'];

    // Generate owner code
    $ownerCode = generateOwnerCode($conn);

    // Insert owner information
    $stmt = $conn->prepare("INSERT INTO owners (owner_code, first_name, middle_name, last_name, contact_number, age, sex, barangay, owner_picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssiiss", $ownerCode, $firstName, $middleName, $lastName, $contactNumber, $ageOwner, $sexOwner, $barangay, $ownerPicture);

    if ($stmt->execute()) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Owner information added!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = $stmt->error;
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    $stmt->close();

    // Cat information
    $catName = $_POST['name'];
    $catSex = $_POST['sex'];
    $catAge = $_POST['age'];
    $color = $_POST['color'];
    $vaccinationStatus = $_POST['vaccinationStatus'];
    $dateVacc = $_POST['dateVacc'] ?? null;

    // Insert cat information
    $stmt = $conn->prepare("INSERT INTO cats (name, sex, age, color, owner_code, vacc_status, date_vacc, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiissss", $catName, $catSex, $catAge, $color, $ownerCode, $vaccinationStatus, $dateVacc, $catPicture);

    if ($stmt->execute()) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Cat information added!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = $stmt->error;
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
    }

    $stmt->close();
    $conn->close();

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}