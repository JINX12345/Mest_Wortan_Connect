<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My App</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Welcome to My App</h1>
    <?php if (isset($_GET['message'])): ?>
      <p><?php echo htmlspecialchars($_GET['message']); ?></p>
    <?php endif; ?>
    <form id="dataForm" action="submit_form.php" method="POST">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <button type="submit">Submit</button>
    </form>
    <div id="response" class="response-message"></div>
  </div>
</body>
</html>