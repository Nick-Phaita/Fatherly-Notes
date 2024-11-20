<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../src/api_functions.php'; // Make sure the path is correct

// Check for GET requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = getSomeApiData(); // Example function
    header('Content-Type: application/json'); // Set the correct content type
    echo json_encode($result); // Output JSON response
} else {
    // If not a GET request, send an error response
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Invalid request method']);
}
?>

