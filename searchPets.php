<?php
header('Content-Type: application/json'); // Force JSON response
error_reporting(E_ALL);
ini_set('display_errors', 1);

$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

require_once 'includes/conn.php'; // Include database connection

// Corrected SQL query with UNION and matching columns
$query = "
    SELECT id, name, owner_code, species, age, color, vacc_status, picture 
    FROM (
        SELECT id, name, owner_code, 'cat' AS species, age, color, vacc_status, picture FROM cats
        UNION
        SELECT id, name, owner_code, 'dog' AS species, age, color, vacc_status, picture FROM dogs
    ) AS pets
    WHERE name LIKE ? OR owner_code LIKE ?";

$stmt = $conn->prepare($query);

if (!$stmt) {
    echo json_encode(['error' => 'Query preparation failed: ' . $conn->error]);
    exit;
}

$searchParam = '%' . $searchQuery . '%';
$stmt->bind_param('ss', $searchParam, $searchParam);
$stmt->execute();
$result = $stmt->get_result();
$pets = $result->fetch_all(MYSQLI_ASSOC);

// Close resources
$stmt->close();
$conn->close();

// Output JSON response
echo json_encode(count($pets) > 0 ? $pets : []);
?>