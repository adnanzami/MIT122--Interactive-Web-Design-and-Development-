<?php
require 'config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $city = $_POST['city'] ?? '';
    $services = $_POST['services'] ?? []; // array of selected services
    $bio = $_POST['bio'] ?? '';

    // Convert services array to comma-separated string
    $services_str = implode(',', $services);

    // Optional: generate a default password or ask user for one
    $password = password_hash('default123', PASSWORD_DEFAULT);

    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO sitters (name, email, phone, city, services, bio, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $success = $stmt->execute([$name, $email, $phone, $city, $services_str, $bio, $password]);

    if ($success) {
        $message = "Your application has been submitted successfully!";
    } else {
        $message = "Error: Could not submit your application.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SafePaws – Become a Sitter</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Main navigation -->
<?php include 'header.php'; ?>

<main class="container" style="padding:28px 0 60px">
  <h1>Become a Sitter</h1>
  <p>Fill out the form below to offer your pet care services.</p>

  <?php if($message) echo "<p style='color:green;'>$message</p>"; ?>

  <form method="post">
    <label>Full Name</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <label>Phone</label><br>
    <input type="tel" name="phone" required><br><br>

    <label>City / Area</label><br>
    <input type="text" name="city" required><br><br>

    <label>Services Offered</label><br>
    <select multiple name="services[]">
      <option>Dog Walking</option>
      <option>Dog Boarding</option>
      <option>House Sitting</option>
      <option>Day Care</option>
      <option>Drop-in Visits</option>
    </select><br><br>

    <label>Short Bio</label><br>
    <textarea name="bio" rows="4"></textarea><br><br>

  <form action="register_sitter.php" method="post" enctype="multipart/form-data">
  <label>Full Name</label><br>
  <input type="text" name="name" required><br><br>

    <button class="findbtn" type="submit">Submit Application</button>
  </form>
</main>
</body>
</html>
