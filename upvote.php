<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seba_my_app_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = intval($_POST['id']);
  
  $sql = "UPDATE staff_profiles SET upvotes = upvotes + 1 WHERE id = $id";
  if ($conn->query($sql) === TRUE) {
    $sql = "SELECT upvotes FROM staff_profiles WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo json_encode(['upvotes' => $row['upvotes']]);
    } else {
      echo json_encode(['error' => 'Profile not found']);
    }
  } else {
    echo json_encode(['error' => 'Failed to update upvotes']);
  }
}

$conn->close();
?>