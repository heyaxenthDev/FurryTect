<?php
include 'includes/conn.php';

if (isset($_POST['id'], $_POST['species'])) {
    $id = $_POST['id'];
    $species = $_POST['species'];

    // Validate inputs
    $valid_species = ['Dog', 'Cat'];
    if (!is_numeric($id) || !in_array($species, $valid_species)) {
        echo json_encode(['status' => 'error', 'data' => null, 'message' => 'Invalid input']);
        exit;
    }

    // Prepare query
    $query = "SELECT s.*, o.barangay, o.first_name, o.last_name 
              FROM {$species}s s 
              INNER JOIN owners o ON s.owner_code = o.owner_code 
              WHERE s.id = ?";
    
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            echo json_encode($data);
        } else {
            echo json_encode([]);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'data' => null, 'message' => 'Database error']);
    }
} else {
    echo json_encode(['status' => 'error', 'data' => null, 'message' => 'Missing parameters']);
}
?>