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

// Fetch staff profiles from the database
$sql = "SELECT id, name, role, interests, image_url, upvotes FROM staff_profiles ORDER BY upvotes DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Profiles - Mest Woreton Institute</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar">
    <div class="logo">Mest Woreton</div>
    <ul class="nav-links">
      <li><a href="index.html">Home</a></li>
      <li><a href="staff_profiles.php">Staff Profiles</a></li>
      <li><a href="signup.html">Sign Up</a></li>
      <li><a href="login.html" class="logout-button">Log Out</a></li>
    </ul>
  </nav>

  <!-- Staff Profiles Section -->
  <section class="staff-profiles">
    <h2>Meet Our Staff</h2>
    <div class="profile-grid" id="profile-grid">
      <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <div class="profile-card">
            <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['name']; ?>">
            <div class="profile-info">
              <h3><?php echo $row['name']; ?></h3>
              <p><?php echo $row['role']; ?></p>
              <p class="interests"><?php echo $row['interests']; ?></p>
            </div>
            <button class="upvote-button" data-id="<?php echo $row['id']; ?>">👍 Upvote <span class="upvote-count"><?php echo $row['upvotes']; ?></span></button>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>No staff profiles found.</p>
      <?php endif; ?>
    </div>
  </section>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.upvote-button').click(function() {
        var button = $(this);
        var id = button.data('id');
        
        $.ajax({
          url: 'upvote.php',
          type: 'POST',
          data: { id: id },
          success: function(response) {
            var data = JSON.parse(response);
            if (data.upvotes !== undefined) {
              button.find('.upvote-count').text(data.upvotes);
            } else {
              alert('Failed to upvote');
            }
          },
          error: function() {
            alert('Error in upvoting');
          }
        });
      });
    });
  </script>
  <script src="script.js"></script>
</body>
</html>

<?php
$conn->close();
?>