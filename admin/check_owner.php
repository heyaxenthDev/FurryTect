<?php
// Database connection
include 'includes/conn.php';

if (isset($_POST['ownersCode'])) {
    $ownersCode = $_POST['ownersCode'];

    // Query the database
    $sql = "SELECT * FROM `owners` WHERE `owner_code` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $ownersCode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<div class='card'>
                <div class='card-body'>
                    <img src='" . $row['owner_picture'] . "' class='card-img-top' alt='Owner Picture'>
                    <h5 class='card-title'>" . $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] . "</h5>
                    <p class='card-text'>Contact Number: " . $row['contact_number'] . "</p>
                    <p class='card-text'>Age: " . $row['age'] . "</p>
                    <p class='card-text'>Sex: " . $row['sex'] . "</p>
                    <p class='card-text'>Barangay: " . $row['barangay'] . "</p>
                </div>
              </div>";
    } else {
        echo "<p>No owner record found</p>";
    }

    $stmt->close();
    $conn->close();
}
