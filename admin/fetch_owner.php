<?php
// fetch_dog.php

include 'includes/conn.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM `owners` WHERE `id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $owner = $result->fetch_assoc();
        echo json_encode($owner);
    } else {
        echo json_encode([]);
    }

    $stmt->close();
}