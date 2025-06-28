<?php
session_start();
include 'includes/conn.php';
$file_path = "admin/";


// Generate unique owner code based on the database auto increment value
function generateOwnerCode($conn)
{
    $randomNumber = rand(10000, 99999);
    $result = $conn->query("SHOW TABLE STATUS LIKE 'owners'");
    $row = $result->fetch_assoc();
    $nextAutoIncrement = $row['Auto_increment'];
    return $randomNumber . "-" . $nextAutoIncrement;
}

function handleFileUpload($file, $uploadDir)
{
    // Ensure the directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create directory if it doesn't exist
    }

    // Allowed file types
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

    if (!in_array($file['type'], $allowedTypes)) {
        return str_replace('admin/', '', $uploadDir . "default-image.jpg"); // Return default image if invalid file type
    }

    // Proceed with upload if there's no error
    if ($file['error'] === UPLOAD_ERR_OK) {
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $uniqueFileName = uniqid("pet_", true) . "." . $fileExtension;
        $fullPath = $uploadDir . $uniqueFileName; // Full path for file storage
        $trimmedPath = str_replace('admin/', '', $fullPath);

        if (move_uploaded_file($file['tmp_name'], $fullPath)) {
            return $trimmedPath; // Return trimmed path for DB
        }
    }
    return str_replace('admin/', '', $uploadDir . "default-image.jpg"); // Default path in case of failure
}



// Handle form submission for Dogs registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['DogsReg'])) {

    // Handle file uploads and fallback to default if no file is provided
    $ownerPicture = handleFileUpload($_FILES['ownerImage'], $file_path.'uploads/owners/');
    $dogPicture = handleFileUpload($_FILES['dogImage'], $file_path.'uploads/dogs/');

    // Sanitize and retrieve owner information
    $firstName = trim(htmlspecialchars($_POST['firstName']));
    $middleName = trim(htmlspecialchars($_POST['middleName']));
    $lastName = trim(htmlspecialchars($_POST['lastName']));
    $contactNumber = trim(htmlspecialchars($_POST['contactNumber']));
    $dob = trim(htmlspecialchars($_POST['DateofBirth']));
    $ageOwner = intval($_POST['ageOwner']); // Ensure it's an integer
    $sexOwner = trim(htmlspecialchars($_POST['sexOwner']));
    $barangay = trim(htmlspecialchars($_POST['barangay']));
    $admin_confirm = 1;

    // Generate unique owner code
    $ownerCode = generateOwnerCode($conn);

    // Insert owner information into database
    $stmt = $conn->prepare("INSERT INTO owners (owner_code, first_name, middle_name, last_name, date_of_birth, contact_number, age, sex, barangay, owner_picture, admin_confirm) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssiissi", $ownerCode, $firstName, $middleName, $lastName, $dob, $contactNumber, $ageOwner, $sexOwner, $barangay, $ownerPicture, $admin_confirm);

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
    $dogAgeYears = $_POST['age_years'];
    $dogAgeMonths = $_POST['age_months'];
    $color = $_POST['color'];
    $vaccinationStatus = $_POST['vaccinationStatus'];
    $dateVacc = $_POST['dateVacc'] ?? null;

    // Insert dog information into database
    $stmt = $conn->prepare("INSERT INTO dogs (tag_number, date_tagged, name, sex, age_years, age_months, color, owner_code, vacc_status, date_vacc, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiisssss", $tagNumber, $dateTagged, $dogName, $dogSex, $dogAgeYears, $dogAgeMonths, $color, $ownerCode, $vaccinationStatus, $dateVacc, $dogPicture);

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

// Handle form submission for Cats registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['CatsReg'])) {

    // Handle file uploads and fallback to default if no file is provided
    $ownerPicture = handleFileUpload($_FILES['catOwnerImage'], $file_path.'uploads/owners/');
    $catPicture = handleFileUpload($_FILES['catImage'], $file_path.'uploads/cats/');

    // Sanitize and retrieve owner information
    $firstName = trim(htmlspecialchars($_POST['firstName']));
    $middleName = trim(htmlspecialchars($_POST['middleName']));
    $lastName = trim(htmlspecialchars($_POST['lastName']));
    $contactNumber = trim(htmlspecialchars($_POST['contactNumber']));
    $dob = trim(htmlspecialchars($_POST['DateofBirth']));
    $ageOwner = intval($_POST['ageOwner']); // Ensure it's an integer
    $sexOwner = trim(htmlspecialchars($_POST['sexOwner']));
    $barangay = trim(htmlspecialchars($_POST['barangay']));
    $admin_confirm = 1;

    // Generate unique owner code
    $ownerCode = generateOwnerCode($conn);

    // Insert owner information into database
    $stmt = $conn->prepare("INSERT INTO owners (owner_code, first_name, middle_name, last_name, date_of_birth, contact_number, age, sex, barangay, owner_picture, admin_confirm) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssiissi", $ownerCode, $firstName, $middleName, $lastName, $dob, $contactNumber, $ageOwner, $sexOwner, $barangay, $ownerPicture, $admin_confirm);

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
    $catAgeYears = $_POST['age_years'];
    $catAgeMonths = $_POST['age_months'];
    $color = $_POST['color'];
    $vaccinationStatus = $_POST['vaccinationStatus'];
    $dateVacc = $_POST['dateVacc'] ?? null;

    // Insert cat information into database
    $stmt = $conn->prepare("INSERT INTO cats (name, sex, age_years, age_months, color, owner_code, vacc_status, date_vacc, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiisssss", $catName, $catSex, $catAgeYears, $catAgeMonths, $color, $ownerCode, $vaccinationStatus, $dateVacc, $catPicture);

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
?>