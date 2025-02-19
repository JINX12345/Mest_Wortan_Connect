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
$email = $_POST['email'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

// Insert data into the database
$sql = "INSERT INTO users (name, email, username, password) VALUES ('$name', '$email', '$username', '$password')";
if ($conn->query($sql) === TRUE) {
  $message = "Account created successfully!";
} else {
  $message = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Redirect back to signup.html with a message
header("Location: signup.html?message=" . urlencode($message));
exit();
?>