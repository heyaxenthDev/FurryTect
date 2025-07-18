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
    $dob = $_POST['DateofBirth'];
    $ageOwner = $_POST['ageOwner'];
    $sexOwner = $_POST['sexOwner'];
    $barangay = $_POST['barangay'];
    $admin_confirm = 1;

    // Generate owner code
    $ownerCode = generateOwnerCode($conn);

    // Insert owner information
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

    // Insert dog information
    $stmt = $conn->prepare("INSERT INTO dogs (tag_number, date_tagged, name, sex, age_years, age_months, color, owner_code, vacc_status, date_vacc, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiisssss", $tagNumber, $dateTagged, $dogName, $dogSex, $dogAgeYears, $dogAgeMonths, $color, $ownerCode, $vaccinationStatus, $dateVacc, $dogPicture);

    if ($stmt->execute()) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Dog information added!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";

        logActivity($conn, $_SESSION['username'], 'Registered a Dog and Owner record, reference owner code: ' . $ownerCode);
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
    $dob = $_POST['DateofBirth'];
    $sexOwner = $_POST['sexOwner'];
    $barangay = $_POST['barangay'];
    $admin_confirm = 1;

    // Generate owner code
    $ownerCode = generateOwnerCode($conn);

    // Insert owner information
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

    // Insert cat information
    $stmt = $conn->prepare("INSERT INTO cats (name, sex, age_years, age_months, color, owner_code, vacc_status, date_vacc, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiisssss", $catName, $catSex, $catAgeYears, $catAgeMonths, $color, $ownerCode, $vaccinationStatus, $dateVacc, $catPicture);

    if ($stmt->execute()) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Cat information added!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";

        logActivity($conn, $_SESSION['username'], 'Registered a Cat and Owner record, reference owner code: ' . $ownerCode);
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['AddDogs'])) {

    // Handle file uploads
    $dogPicture = handleFileUpload($_FILES['dogImage'], 'uploads/dogs/');

    // Dog information
    $ownerCode = $_POST['ownerCode'] ?? null;
    $tagNumber = $_POST['tagNumber'] ?? null;
    $dateTagged = $_POST['dateTagged'] ?? null;
    $dogName = $_POST['name'];
    $dogSex = $_POST['sex'];
    $dogAgeYears = $_POST['age_years'];
    $dogAgeMonths = $_POST['age_months'];
    $color = $_POST['color'];
    $vaccinationStatus = $_POST['vaccinationStatus'];
    $dateVacc = $_POST['dateVacc'] ?? null;

    // Insert dog information
    $stmt = $conn->prepare("INSERT INTO dogs (tag_number, date_tagged, name, sex, age_years, age_months, color, owner_code, vacc_status, date_vacc, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiisssss", $tagNumber, $dateTagged, $dogName, $dogSex, $dogAgeYears, $dogAgeMonths, $color, $ownerCode, $vaccinationStatus, $dateVacc, $dogPicture);

    if ($stmt->execute()) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Dog information added!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";

        logActivity($conn, $_SESSION['username'], 'Added a Dog with the existing Owner record, reference owner code: ' . $ownerCode);
        
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['AddCats'])) {

    // Handle file uploads
    $catPicture = handleFileUpload($_FILES['catImage'], 'uploads/cats/');

    // Cat information
    $ownerCode = $_POST['ownerCode'] ?? null;
    $catName = $_POST['name'];
    $catSex = $_POST['sex'];
    $catAgeYears = $_POST['age_years'];
    $catAgeMonths = $_POST['age_months'];
    $color = $_POST['color'];
    $vaccinationStatus = $_POST['vaccinationStatus'];
    $dateVacc = $_POST['dateVacc'] ?? null;

    // Insert cat information
    $stmt = $conn->prepare("INSERT INTO cats (name, sex, age_years, age_months, color, owner_code, vacc_status, date_vacc, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiisssss", $catName, $catSex, $catAgeYears, $catAgeMonths, $color, $ownerCode, $vaccinationStatus, $dateVacc, $catPicture);

    if ($stmt->execute()) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Cat information added!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";

        logActivity($conn, $_SESSION['username'], 'Added a Cat with the existing Owner record, reference owner code: ' . $ownerCode);
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['UpdateDogs'])) {
    // Retrieve form data
    $dogPicture = handleFileUpload($_FILES['dogImage'], 'uploads/dogs/');

    $tagNumber = $_POST['tagNumber'];
    $dateTagged = $_POST['dateTagged'];
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $ageYears = $_POST['age_years'];
    $ageMonths = $_POST['age_months'];
    $color = $_POST['color'];
    $vaccinationStatus = $_POST['vaccinationStatus'];
    $dateVacc = $_POST['dateVacc'];

    // Update the dog information in the database
    $query = "UPDATE dogs SET tag_number=?, date_tagged=?, name=?, sex=?, age_years=?, age_months=?, color=?, vacc_status=?, date_vacc=?, picture=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssiissssi", $tagNumber, $dateTagged, $name, $sex, $ageYears, $ageMonths, $color, $vaccinationStatus, $dateVacc, $dogPicture, $dogId);

    // Assuming you have a variable $dogId that holds the ID of the dog being edited
    $dogId = $_POST['dogId'];

    if ($stmt->execute()) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Dog information updated!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";

        logActivity($conn, $_SESSION['username'], 'Updated dog record, reference dog code: ' . $dogId);
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = $stmt->error;
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
    }

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['UpdateCats'])) {
    // Retrieve form data

    $catPicture = handleFileUpload($_FILES['catImage'], 'uploads/cats/');

    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $ageYears = $_POST['age_years'];
    $ageMonths = $_POST['age_months'];
    $color = $_POST['color'];
    $vaccinationStatus = $_POST['vaccinationStatus'];
    $dateVacc = $_POST['dateVacc'];

    // Update the dog information in the database
    $query = "UPDATE cats SET name=?, sex=?, age_years=?, age_months=?, color=?, vacc_status=?, date_vacc=?, picture=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssiissssi", $name, $sex, $ageYears, $ageMonths, $color, $vaccinationStatus, $dateVacc, $catPicture, $catId);

    // Assuming you have a variable $catId that holds the ID of the dog being edited
    $catId = $_POST['catId'];

    if ($stmt->execute()) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Cat information updated!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";

        logActivity($conn, $_SESSION['username'], 'Updated cat record, reference cat code: ' . $catId);

    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = $stmt->error;
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
    }

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['UpdateOwners'])) {
    // Retrieve form data
    // $ownerPicture = handleFileUpload($_FILES['ownerImage'], 'uploads/owners/');

    $ownerId = $_POST['ownerId'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $sexOwner = $_POST['sexOwner'];
    $dobOwner = $_POST['DateofBirth'];
    $ageOwner = $_POST['ageOwner'];
    $contactNumber = $_POST['contactNumber'];
    $barangay = $_POST['barangay'];

    // Check if a file was uploaded
    if ($_FILES['ownerImage']['size'] > 0) {
        // Remove previous image
        $query = "SELECT owner_picture FROM owners WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $ownerId);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($oldImage);
        $stmt->fetch();
        $stmt->close();

        if (!empty($oldImage)) {
            $targetDir = "uploads/";
            $filePath = $targetDir . $oldImage;
            if (file_exists($filePath)) {
                unlink($filePath); // Delete the old image file
            }
        }

        // Handle the new file upload
        $targetDir = "uploads/";
        $fileName = basename($_FILES['ownerImage']['name']);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES['ownerImage']['tmp_name'], $targetFilePath)) {
                // Update the database with the new file path
                $query = "UPDATE owners SET first_name=?, middle_name=?, last_name=?, date_of_birth=?, sex=?, age=?, contact_number=?, barangay=?, owner_picture=? WHERE id=?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("sssssisssi", $firstName, $middleName, $lastName, $dobOwner, $sexOwner, $ageOwner, $contactNumber, $barangay, $targetFilePath, $ownerId);

                if ($stmt->execute()) {
                    $_SESSION['status'] = "Success";
                    $_SESSION['status_text'] = "Owner information updated!";
                    $_SESSION['status_code'] = "success";
                    $_SESSION['status_btn'] = "Done";

                    logActivity($conn, $_SESSION['username'], 'Updated Owner record, reference owner code: ' . $ownerId);

                } else {
                    $_SESSION['status'] = "Error";
                    $_SESSION['status_text'] = $stmt->error;
                    $_SESSION['status_code'] = "error";
                    $_SESSION['status_btn'] = "Back";
                }

                $stmt->close();
            } else {
                $_SESSION['status'] = "Error";
                $_SESSION['status_text'] = "Sorry, there was an error uploading your file.";
                $_SESSION['status_code'] = "error";
                $_SESSION['status_btn'] = "Back";
            }
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
        }
    } else {
        // No file uploaded, update database without the image
        $query = "UPDATE owners SET first_name=?, middle_name=?, last_name=?, date_of_birth=?, sex=?, age=?, contact_number=?, barangay=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssissi", $firstName, $middleName, $lastName, $dobOwner, $sexOwner, $ageOwner, $contactNumber, $barangay, $ownerId);

        if ($stmt->execute()) {
            $_SESSION['status'] = "Success";
            $_SESSION['status_text'] = "Owner information updated!";
            $_SESSION['status_code'] = "success";
            $_SESSION['status_btn'] = "Done";

            logActivity($conn, $_SESSION['username'], 'Updated owner record, reference owner code: ' . $ownerId);
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = $stmt->error;
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
        }

        $stmt->close();
    }

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

function logActivity($conn, $username, $desc){
    $sql = "INSERT INTO log_history (username, description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $desc);
    $stmt->execute();
    $stmt->close();

}

?>