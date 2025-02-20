<?php
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "seba_my_app_db"; // Updated database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get data from the request
$data = json_decode(file_get_contents('php://input'), true);
$staffId = $data['id'];



// Update upvotes in the database
$sql = "UPDATE staff_profiles SET upvotes = upvotes + 1 WHERE id = $staffId";
$response = array();

if ($conn->query($sql) === TRUE) {
  $response['success'] = true;
} else {
  $response['success'] = false;
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>