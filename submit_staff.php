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

// Get data from the form
$name = $_POST['name'];
$role = $_POST['role'];
$interests = $_POST['interests'];
$image_url = $_POST['image_url'];

// Insert data into the database
$sql = "INSERT INTO staff_profiles (name, role, interests, image_url) VALUES ('$name', '$role', '$interests', '$image_url')";
if ($conn->query($sql) === TRUE) {
  $message = "Staff member added successfully!";
} else {
  $message = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Redirect back to index.html with a message
header("Location: index.html?message=" . urlencode($message));
exit();
?>