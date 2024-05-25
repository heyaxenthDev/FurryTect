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
    $stmt->bind_param("sssiisssss", $tagNumber, $dateTagged, $dogName, $dogSex, $dogAge, $color, $ownerCode, $vaccinationStatus, $dateVacc, $dogPicture);

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
    $stmt->bind_param("ssisssss", $catName, $catSex, $catAge, $color, $ownerCode, $vaccinationStatus, $dateVacc, $catPicture);

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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['AddDogs'])) {

    // Handle file uploads
    $dogPicture = handleFileUpload($_FILES['dogImage'], 'uploads/dogs/');

    // Dog information
    $ownerCode = $_POST['ownerCode'] ?? null;
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
    $stmt->bind_param("sssiisssss", $tagNumber, $dateTagged, $dogName, $dogSex, $dogAge, $color, $ownerCode, $vaccinationStatus, $dateVacc, $dogPicture);

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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['AddCats'])) {

    // Handle file uploads
    $catPicture = handleFileUpload($_FILES['catImage'], 'uploads/cats/');

    // Cat information
    $ownerCode = $_POST['ownerCode'] ?? null;
    $catName = $_POST['name'];
    $catSex = $_POST['sex'];
    $catAge = $_POST['age'];
    $color = $_POST['color'];
    $vaccinationStatus = $_POST['vaccinationStatus'];
    $dateVacc = $_POST['dateVacc'] ?? null;

    // Insert cat information
    $stmt = $conn->prepare("INSERT INTO cats (name, sex, age, color, owner_code, vacc_status, date_vacc, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssss", $catName, $catSex, $catAge, $color, $ownerCode, $vaccinationStatus, $dateVacc, $catPicture);

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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['UpdateDogs'])) {
    // Retrieve form data
    $tagNumber = $_POST['tagNumber'];
    $dateTagged = $_POST['dateTagged'];
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $color = $_POST['color'];
    $vaccinationStatus = $_POST['vaccinationStatus'];
    $dateVacc = $_POST['dateVacc'];

    // Update the dog information in the database
    $query = "UPDATE dogs SET tag_number=?, date_tagged=?, name=?, sex=?, age=?, color=?, vacc_status=?, date_vacc=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssiisssi", $tagNumber, $dateTagged, $name, $sex, $age, $color, $vaccinationStatus, $dateVacc, $dogId);

    // Assuming you have a variable $dogId that holds the ID of the dog being edited
    $dogId = $_POST['dogId'];

    if ($stmt->execute()) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Dog information updated!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";
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

    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $color = $_POST['color'];
    $vaccinationStatus = $_POST['vaccinationStatus'];
    $dateVacc = $_POST['dateVacc'];

    // Update the dog information in the database
    $query = "UPDATE cats SET name=?, sex=?, age=?, color=?, vacc_status=?, date_vacc=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("siisssi", $name, $sex, $age, $color, $vaccinationStatus, $dateVacc, $dogId);

    // Assuming you have a variable $dogId that holds the ID of the dog being edited
    $dogId = $_POST['catId'];

    if ($stmt->execute()) {
        $_SESSION['status'] = "Success";
        $_SESSION['status_text'] = "Cat information updated!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";
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

    $ownerId = $_POST['ownerId'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $sexOwner = $_POST['sexOwner'];
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
                $query = "UPDATE owners SET first_name=?, middle_name=?, last_name=?, sex=?, age=?, contact_number=?, barangay=?, owner_picture=? WHERE id=?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ssssissis", $firstName, $middleName, $lastName, $sexOwner, $ageOwner, $contactNumber, $barangay, $fileName, $ownerId);

                if ($stmt->execute()) {
                    $_SESSION['status'] = "Success";
                    $_SESSION['status_text'] = "Owner information updated!";
                    $_SESSION['status_code'] = "success";
                    $_SESSION['status_btn'] = "Done";
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
        $query = "UPDATE owners SET first_name=?, middle_name=?, last_name=?, sex=?, age=?, contact_number=?, barangay=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssissi", $firstName, $middleName, $lastName, $sexOwner, $ageOwner, $contactNumber, $barangay, $ownerId);

        if ($stmt->execute()) {
            $_SESSION['status'] = "Success";
            $_SESSION['status_text'] = "Owner information updated!";
            $_SESSION['status_code'] = "success";
            $_SESSION['status_btn'] = "Done";
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
?>